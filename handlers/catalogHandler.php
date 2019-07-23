<?php
    
    include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/modules/function.php');
    $items = [];
    $cat = $_GET['category']; // 8
    // поучим дочерние категории 
    $itemsOnPage = 10;

    $catalog_info = [
        'catalogItems' => [],
        'pagination' => [
            'currentPage' => $_GET['curPage'],
            'allPages' => 1
        ]
    ];

    // 1: 1-10
    // 2: 11-20
    // 3: 21-30

    // floor();
    // round();
    // ceil();

    // 2 страница 
    // 10 товаров 
    // Отобразить количество кубиков

    // 1. Запрос к БД с просьбой посчитать все товары запрошенной категории
    // 2. Нашли 32 товара
    // 3. Делим 32 на 10 (количество товаров на странице) + округляю вверх
    // 4. Делаю запрос к БД с просьбой найти и взять первые 11-20 товаров
    // 5. Получаем эти товары и отправляем в JS 
 
    sleep(2);
    // preloader

    // Узнаем, родительская это категория ил дочерняя
    $query = "SELECT `parent_id` FROM `categories` WHERE `id` = $cat";
    $result = mysqli_fetch_assoc( mysqli_query($link, $query) );

    if ( !$result['parent_id'] ) { // 0 - true  // - false


        $query = "SELECT `id` FROM `categories` WHERE `parent_id` = $cat";
        $result = mysqli_query($link, $query);

        
        $catalog = [];
        while ( $res = mysqli_fetch_assoc($result) ) {
            $catalog[] = ( getProductsFromCatalog($res['id'], $link, $items) );
        } 

        // d($catalog);

        $newCatalog = [];
        foreach ( $catalog as $key => $value ) {
            foreach ( $value as $index => $item ) {
                $newCatalog[] = $item;
            }
        }

        // $query = "SELECT COUNT(`id`) AS `result` FROM `shop`  WHERE `category` = {$catID} AND `price` BETWEEN 3000 and 6000";
        // $res = mysqli_query($link, $query);
        // $res['result'];

        $catalog_info['catalogItems'] = $newCatalog;
        echo json_encode($catalog_info);
    } else {  
        $catalog_info['catalogItems'] = getProductsFromCatalog($cat, $link, $items);
        echo json_encode( $catalog_info );
    }

    
    

    // $items - массив с данными о каждой строчке


    // echo json_encode($items);

    // $items = [
    //     0 => [
    //         'id' => 1,
    //         'title' => 'футболка',
    //         'price' => '15900.00'
    //     ],
    //     1 => [
    //         'id' => 1,
    //         'title' => 'футболка',
    //         'price' => '15900.00'
    //     ],
    //     2 => [
    //         'id' => 1,
    //         'title' => 'футболка',
    //         'price' => '15900.00'
    //     ]
    // ];

?>