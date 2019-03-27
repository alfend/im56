<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */


$this->title = 'Список товаров';
?>
<div class="row">
    <div class="col-lg-12 contant_wrap">
        <div class="navigation">
            <!--хлебные крошки-->

            <ul>
                <li><a href="<?= URL::toRoute(['site/index']) ?>"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="<?= URL::toRoute(['page/catalog']) ?>">Каталог</a></li>
                <li><span><?php echo $categories['name']; ?></span></li>
            </ul>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 filter">
    <h3>Фильтры</h3>
    <form>
        <label>Цена / руб</label>
        <div class="filter_price">
            <input type="text" value="0">
            -
            <input type="text" value="10000">
        </div>
        <label>Объем / л</label>
        <div class="filter_check">
            <p><input type="checkbox"/>10</p>
            <p><input type="checkbox"/>20</p>
            <p><input type="checkbox"/>30</p>
        </div>

        <button type="submit">Подобрать</button>
    </form>
</div>

<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

    <div class="short_description">

        <img src="/images/<?php echo $categories['img']; ?>">
        <div>
            <h2><?php echo $categories['name']; ?></h2>
            <p><?php echo $categories['description']; ?></p>
        </div>
    </div>
    <div class="row content">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header_list_prod">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <h1>Рюкзаки</h1>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 value_prod">
                    <p>В наличии: <?php echo $count_product; ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sortirovka_and_number_prod">
                    <?php $form = ActiveForm::begin(); ?>

                    <p><strong>Сортировка по:</strong> <?php echo $form->field($model, 'str')->dropDownList(
                            ['price ASC' => 'Цене, по возрастанию',
                                'price DESC' => 'Цене, по убыванию',
                                'name ASC' => 'Названию товара, от А до Я',
                                'name DESC' => 'Названию товара, от Я до А'

                            ], ['prompt' => '--',]); ?></p>
                    <p>

                        <?php

                        echo "<strong>Показать:</strong>";
                        echo $form->field($model, 'number')->dropDownList(['10' => '10', '12' => '12', '24' => '24']
                            , [
                                'options' => [isset($model->number) ? $model->number : '12' => ['Selected' => true]]
                            ]
                        );

                        ?>

                    </p>
                    <?php echo Html::submitButton('Go'); ?>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>


        <?php foreach ($products_array as $product): ?>
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 view_list"> -->
                <div class="product">
                    <a href="<?= URL::toRoute(['page/product', 'id' => $product['id']]) ?>" class="product_img">
                        <!--    <span>-10%</span> -->
                        <img src="/images/<?php echo $product['img']; ?>">
                    </a>
                    <a href="<?= URL::toRoute(['page/product', 'id' => $product['id']]) ?>"
                       class="product_title"><?php echo $product['name']; ?></a>
                    <div class="product_price">
                        <span class="price"><?php echo $product['price']; ?> руб</span>
                        <span class="price_old"><?php if ($product['price_old'] != '') echo $product['price_old'] . ' руб'; ?></span>
                    </div>
                    <div class="product_btn">
                        <a href="<?= URL::toRoute(['cart/add', 'id' => $product['id']]) ?>" class="cart"  data-id="<?= $product['id']; ?>" ><i
                                    class="glyphicon glyphicon-shopping-cart"></i></a>
                        <a href="<?= URL::toRoute(['cart/add', 'id' => $product['id']]) ?>" class="mylist"  data-id="<?= $product['id']; ?>" >Купить</a>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>

    </div>
    <div align="center"> <?php echo \yii\widgets\LinkPager::widget([
            'pagination' => $pages,
        ]); ?></div>

