<?php

    include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');

    // Запрос к БД с просьбой найти все категории где parent_id = 0
    $query = "SELECT * FROM `categories` WHERE `parent_id` = 0";
    $result = mysqli_query($link, $query);

    $links = '';
    while ($res = mysqli_fetch_assoc($result)) {
        $links  .= '<li><a href="/catalog/catalog.php?category='.$res['id'].'">'.$res['name'].'</a></li>';
    }

    // формируем ссылку в цикле для каждой строчки, найденной в БД 
?> 

<div class="wrapper">
    
    <header>
        <div class="header-left"></div>
        <div class="header-center">
            <ul>
                <?=$links?>
                <li><a href="#">Новинки</a></li>
                <li><a href="#">О нас</a></li>
            </ul>
        </div>
        
        <div class="header-right">
         <nav class="user">Привет,Виктория<span>(Выйти)</span></nav>
         <a class="user-link">корзина(5)</a>
        </div>
  
    </header>
  
   
</div>