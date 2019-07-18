<?php

 $title = 'главная страница';
 include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php';
 include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php';

?>

    <body>
        <div class="wrapper">

            <section>
                <div class="main">
                    <h1>Новые поступления весны</h1>
                    <h2>Мы подготовили для Вас лучшие новинки сезона</h2>
                    <div class="button">посмотреть новинки</div>

                </div>
            </section>

            <section>

            </section>

            <section>
                <div class="info">

                    <h1>Будь всегда в курсе выгодных предложений</h1>
                    <h2>подписывайся и следи за новинками и выгодными предложениями</h2>

                    <form method="" action="">
                        <input name="email" type="email" placeholder="E-mail">
                        <input type="submit" value="записаться">
                    </form>
                    <p>Некорректный e-mail.Попробуйте еще раз.</p>

                </div>
            </section>


        </div>

    </body>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php';?>
    <script src="/js/main.js"></script>

    </html>