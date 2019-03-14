<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Список товаров';
?>

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

    <img src="images/<?php echo $categories['img'];?>">
    <div>
        <h2><?php echo $categories['name']; ?></h2>
        <p><?php echo $categories['description'] ; ?></p>
    </div>
</div>
<div class="row content">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header_list_prod">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h1>Рюкзаки</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 value_prod">
                <p>В наличии: <?php echo $count_product;?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sortirovka_and_number_prod">
                <form action="#">
                    <p><strong>Сортировка по:</strong>
                        <select name="sortirovka_prod">
                            <option selected="selected">--</option>
                            <option value="0">Цене, по возрастанию</option>
                            <option value="1">Цене, по убыванию</option>
                            <option value="2">Названию товара, от А до Я</option>
                            <option value="3">Названию товара, от Я до А</option>
                        </select>
                    </p>
                    <p><strong>Показать:</strong>
                        <select name="number_prod_str">
                            <option selected="selected">12</option>
                            <option value="0">24</option>
                            <option value="1">48</option>
                        </select>
                    </p>
                    <button type="submit">Go</button>
                </form>
            </div>


        </div>
    </div>



 


        <?php foreach($products_array as $product): ?>
    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
        <div class="product">
            <a href="<?=URL::toRoute(['page/product', 'id' => $product['id']])?>" class="product_img">
            <!--    <span>-10%</span> -->
                <img src="images/<?php echo $product['img'];?>">
            </a>
            <a href="<?=URL::toRoute(['page/product', 'id' => $product['id']])?>" class="product_title"><?php echo $product['name'];?></a>
            <div class="product_price">
                <span class="price"><?php echo $product['price'];?> руб</span>
                <span class="price_old"><?php if($product['price_old']!='')echo $product['price_old'].' руб';?></span>
            </div>
            <div class="product_btn">
                <a href="<?=URL::toRoute(['page/cart', 'id' => $product['id']])?>" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                <a href="<?=URL::toRoute(['page/listorder', 'id' => $product['id']])?>" class="mylist">Список желаний</a>
            </div>
        </div>
    </div>
        <?php endforeach; ?>

</div>


