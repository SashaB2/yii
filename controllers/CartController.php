<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Order;
use app\models\OrderItem;
use app\models\Product;

class CartController extends AppController
{
    public function actionAdd($id){
        $id = \Yii::$app->request->get('id');
        $qty = (int)\Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if(empty($product)) return false;

        $session = \Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($product, $qty);

        if(!\Yii::$app->request->isAjax){
            return $this->redirect(\Yii::$app->request->referrer);
        }

        $this->layout = false;

        return $this->render('cart-modal', compact('session'));
      }

      public function actionClear(){
          $session = \Yii::$app->session;
          $session->open();
          $session->remove('cart');
          $session->remove('cart.qty');
          $session->remove('cart.sum');

          $this->layout = false;
          return $this->render('cart-modal', compact('session'));
      }

      public function actionDelItem(){
          $id = \Yii::$app->request->get('id');
          $session = \Yii::$app->session;
          $session->open();

          $cart = new Cart();
          $cart->recalc($id);

          $this->layout = false;
          return $this->render('cart-modal', compact('session'));
      }

    public function actionShow(){
        $session = \Yii::$app->session;
        $session->open();

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }


    public function actionView(){
        $session = \Yii::$app->getSession();
        $session->open();
        $this->setMeta('Корзина');
        $order = new Order();
        if($order->load(\Yii::$app->request->post())){
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            if($order->save()){
                $this->saveOrderItems($session['cart'], $order->id);
                \Yii::$app->session->setFlash('success', 'Замовлення приняте');
                \Yii::$app->mailer->compose('order', compact('session'))
                    ->setFrom(['test@gmail.com' => 'yii2.loc'])
                    ->setTo($order->email)
                    ->setSubject('Замовлення')
                    ->send();
                ;
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                $this->refresh();
            }else{
                \Yii::$app->session->setFlash('error', 'Замовлення не приняте');
            }
        }
        return $this->render('view', compact('session', 'order'));
    }

    protected function saveOrderItems($items, $order_id){
        foreach ($items as $id => $item){
            $order_item = new OrderItem();
            $order_item->order_id = $order_id;
            $order_item->product_id = $id;
            $order_item->name = $item['name'];
            $order_item->price = $item['price'];
            $order_item->qty_item = $item['qty'];
            $order_item->sum_item = $item['qty'] * $item['price'];
            $order_item->save();
        }
    }
}