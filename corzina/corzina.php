<?php

$title = 'corzina';
include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php';

?>
<body>
  <div class="wrapper">

    <section>
        <div class="product">
          <h1>Ваша корзина</h1>
          <h2><i>Товары резервируются на ограниченное время</i></h2>
        </div>
        <div class="block">
          <table>
            <thead>
              <tr>

                <td colspan ="2">фото</td>
                <td class="first"colspan ="2">наименование</td>
                <td>размер</td>
                <td>количество</td>
                <td>стоимость</td>
                <td>удалить</td>
              
              </tr>
            </thead>
            <tbody>
              <tr>

                <td colspan ="2"><img src="/image/1.jpg" style="width:100px; border: 2px solid rgba(94, 86, 73, 0.701);"></td>
                <td colspan ="2">Куртка синяя <br>арт.123412</td>
                <td>39</td>
                <td>
                  <span class = "input-number" >
                    <button class = "minus"></button>
                    <span class = "numeric">1</span>
                    <button class = "plus"></button>
                  </span>
                </td>
                <td>3800руб.</td>
                <td>
                <span class = "close"></span>
                </td>

              </tr>
              
              <tr>
                <td colspan ="2"><img src="/image/7.jpg" style="width:100px; border: 2px solid rgba(94, 86, 73, 0.701);"></td>
                <td colspan ="2">Кеды серые <br>арт.234561</td>
                <td>S</td>
                <td>
                  <span class = "input-number" >
                    <button class = "minus"></button>
                    <span class = "numeric">1</span>
                    <button class = "plus"></button>
                  </span>
                </td>
                <td>5200руб.</td>
                <td>
                <span class = "close"></span>
                </td>
              </tr>

              <tr>

                <td colspan ="2"><img src="/image/12.jpg" style="width:100px; border: 2px solid rgba(94, 86, 73, 0.701);"></td>
                <td colspan ="2">Джинсы голубые <br> арт.675894</td>
                <td>M</td>
                <td>
                  <span class = "input-number" >
                    <button class = "minus"></button>
                    <span class = "numeric">1</span>
                    <button class = "plus"></button>
                  </span>
                </td>
                <td>3500руб.</td>
                <td>
                <span class = "close"></span>
                </td>

              </tr>

            </tbody>

            <tfoot>
               <tr>
               <td colspan ="8">итого:<span>12500 руб.</span></td>
               </tr>
            </tfoot>

          </table>

        </div>


    </section>
    <div class = "snake">
     <div class = "snake-item"></div>
     <div class = "snake-item"></div>
     <div class = "snake-item"></div>
    </div>
    <section>
      <div class="adress">
        <h1>Адрес доставки</h1>
        <h2>Все поля обязательны для заполнения</h2>
       
        <form method="" action="">
          <div class = "formline">
              <h3>Выберите вариант доставки </h3>
              <!-- <input name class="delivery"type="text" placeholder="Курьерская служба-500руб."> -->
              <!-- <div class="delivery-arrow"></div>  -->
              
              <select class="delivery" name="del">
                <option>Курьерская служба-500руб.</option>
              </select>
               <!-- <div class="delivery-arrow"></div> -->
        </div>
        </form>
      </div>
    </section>


  </div>
</body>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php';?>
    <script src="/js/main.js"></script>
</html>