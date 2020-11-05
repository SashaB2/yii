<?php


namespace app\controllers;


use app\models\Product;
use yii\web\HttpException;

class ProductController extends AppController
{
    public function actionView($id){
        $id = \Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if(empty($product))
            throw new HttpException(404, 'Такого товару нема');
        $hits = Product::find()->where(['hit' => true])->limit(6)->all();
        $this->setMeta('E-SHOPPER | ' . $product->name, $product->keyword, $product->description);
        return $this->render('view', compact('product', 'hits'));
    }
}