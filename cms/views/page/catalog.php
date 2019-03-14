<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Каталог';
?>

<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 left_banner_menu">
Баннер
</div>



<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 catalog">
    <?php //echo print_r($categorieslist);
    ?>
    <div class="row content">
        <?php foreach($categories as $category): ?>
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 catalog_category">
                <a href="<?=URL::toRoute(['page/listproducts', 'id' => $category['id']])?>"><img src="images/<?php echo $category['img'];?>"></a>
                <a href="<?=URL::toRoute(['page/listproducts', 'id' => $category['id']])?>"><?php echo $category['name'];?></a>
            </div>
        <?php endforeach; ?>

    </div>
</div>


