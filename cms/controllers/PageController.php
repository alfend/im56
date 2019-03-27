<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\SortForm;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Categories;
use app\models\Products;
use app\models\Characteristics;
use yii\data\Pagination;

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
                $model = new SortForm();

                if($model->load(Yii::$app->request->post())&& $model->validate()){

                    //обработка сортировки
                    /* echo "<pre>";
                    print($model->str);
                    echo "</pre>";
                    */
                }


                $products_array = Products::find()->where(['category' => $_GET['id']])->orderBy($model->str);//->all();
                $count_product = count($products_array->all());

                $countQuery = clone $products_array;

                $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => isset($model->number) ? $model->number: 10]);

                $products_array = $products_array->offset($pages->offset)

                    ->limit($pages->limit)

                    ->all();



                return $this->render('listproducts', compact('categories','products_array','count_product','model','pages'));
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
        $products = Products::find()->where(['id' => Yii::$app->request->get('id')])->asArray()->one();

        $characteristics = Characteristics::find()->where(['id_prod' => Yii::$app->request->get('id')])->asArray()->all();

        $categories = Categories::find()->where(['id' =>$products['category']])->asArray()->one();


        return $this->render('product',compact('products','characteristics','categories')); //,compact('product'));
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
    public function actionListorder()
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

    //для
    public function actionNews1()
    {
        return $this->render('news1');
    }

    public function actionNews2()
    {
        return $this->render('news2');
    }

}
