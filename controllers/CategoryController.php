<?php


namespace app\controllers;


use app\models\Product;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit' => true])->asArray()->all();
        debug($hits);
        return $this->render('index', compact('hits'));
    }
}