<?php


function d($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

//функция поиска товаров

function getProductsfromCatalog($catID,$link, $items ){

    // $items = [];

          // ищем товары в БД с нужным идентификатором категории
          // $query = "SELECT * FROM `shop` WHERE `category` = {$catID} AND `price` BETWEEN 0 and 1000";
          // $query = "SELECT * FROM `shop` WHERE `category` = {$catID} AND `price` BETWEEN 1000 and 3000";
          $query = "SELECT * FROM `shop` WHERE `category` = {$catID} ORDER by `id` DESC";
          // $query = "SELECT * FROM `shop` WHERE `category` = {$catID} AND `price` BETWEEN 6000 and 20000";


 
 
          $result_goods = mysqli_query($link, $query);
  
            if ( mysqli_num_rows($result_goods) ) {
              // перебираем объект с товарами и записыаем в массив
                while( $item = mysqli_fetch_assoc($result_goods)) {
                    $items[] = $item;
                  // array_push($items, $item);
                }
            }
        return $items;
}

?>