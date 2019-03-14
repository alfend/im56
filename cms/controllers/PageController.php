<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Categories;
use app\models\Products;

//контроллер для страниц сайта
class PageController extends Controller
{
//для списка товаров
    public function actionListproducts()
    {
        if(isset($_GET['id'])&& $_GET['id']!="" && filter_var($_GET['id'],FILTER_VALIDATE_INT))
        {

            $categories = Categories::find()->where(['id' => Yii::$app->request->get('id')])->asArray()->one();
            if(count($categories)>0)
            {
                $products_array = Products::find()->where(['category' => $_GET['id']])->asArray()->all();
                $count_product = count($products_array);
                return $this->render('listproducts', compact('categories','products_array','count_product'));
                //,'products_array'
            };
        };
        return $this->redirect(['page/catalog']);
    }

    //для каталога
    public function actionCatalog()
    {

        $categories = Categories::find()->asArray()->all();

        return $this->render('catalog',compact('categories'));
    }

    public function actionProduct()
    {

      //  $product = Product::find()->asArray()->one();

        return $this->render('product'); //,compact('product'));
    }

//для новостей
    public function actionNews()
    {
        return $this->render('news');
    }

//для контактов
    public function actionContacts()
    {
        return $this->render('contacts');
    }

//для входа
    public function actionLogin()
    {
        return $this->render('login');
    }

//для
    public function actionCart()
    {
        return $this->render('cart');
    }

//для
    public function actionDostavka()
    {
        return $this->render('dostavka');
    }

//для
    public function actionДistorder()
    {
        return $this->render('listorder');
    }

//для
    public function actionOplata()
    {
        return $this->render('oplata');
    }

//для
    public function actionRegistration()
    {
        return $this->render('registration');
    }

//для
    public function actionSale()
    {
        return $this->render('sale');
    }

}
