<?php

/* @var $this yii\web\View */

$this->title = 'Список товаров';
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contacts">
    <h3>Контакты</h3>
    <p><i class="glyphicon glyphicon-map-marker"></i>Адрес: ул. Ленина, 9 г. Москва, 603089</p>
    <p><i class="glyphicon glyphicon-phone-alt"></i>Служба поддержки: 8 (800) 000-00-00</p>
    <p><i class="glyphicon glyphicon-envelope"></i>E-mail: alfend@yandex.ru</p>

    <div id="map" style="width: 800px; height: 600px" align="centre"></div>

    <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
    <script type="text/javascript">
        var myMap;
        ymaps.ready(init); // Ожидание загрузки API с сервера Яндекса
        function init () {
            myMap = new ymaps.Map("map", {
                center: [55.798034, 37.931812], // Координаты центра карты
                zoom: 10 // Zoom
            });
        }
    </script>
</div>

