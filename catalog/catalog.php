<?php

   $title = 'catalog';
   include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php';
   include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php';
   include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

   $cat =  (isset($_GET['category'])) ? $_GET['category'] : 1;



    // Запрос к БД с просьбой найти все категории где parent_id = 0
    $query = "SELECT * FROM `categories` WHERE `parent_id` =  $cat";
    $result = mysqli_query($link, $query);

    $options = '';

    while ($res = mysqli_fetch_assoc($result)) {
        $options  .= '<option value="'.$res['id'].'">'.$res['name'].'</option>';
    }

    // explode('-',стоимость);

?>





    <section>

        <div class="menu">
            <a href="#">Главная</a> /
            <a href="#">Женщинам </a>
        </div>

        <h1>Женщинам</h1>

        <h2><i>Все товары</i></h2>

        <form action="" method="">
            <div class="category">
                <div class="select">
                   <select name="category" >
                       <option hidden>Категория</option>
                       <?=$options?>
                   </select>
                </div>

                <div class="select">
                    <select name="category">
                        <option value="" hidden>Размер</option>
                    </select>
                </div>

                <div class="select">
                    <select name="category">
                      <option value=""hidden>Стоимость</option>
                      <option value="0-1000">0-1000руб</option>
                      <option value="1000-3000">1000-3000руб</option>
                      <option value="3000-6000">3000-6000руб</option>
                      <option value="6000-20000">6000-20000руб</option>
                    </select>
                </div>
            </div>
        </form>
        
        <div class="catalog"></div>

    </section>

    <section>
        <div class="number"></div>
    </section>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php';?>