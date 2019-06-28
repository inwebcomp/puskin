<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1">

    <title>Puskin - index</title>
    <base href="../">

    <link rel="shortcut icon" href="img/favicons/favicon.ico">

    <!-- temporal connection for fast reload-->
    <link rel="stylesheet" href="fonts/fas/css/fontawesome.min.css">
    <link rel="stylesheet" href="fonts/fas/css/solid.min.css">
    <link rel="stylesheet" href="fonts/fas/css/light.min.css">
    <link rel="stylesheet" href="fonts/fas/css/regular.min.css">
    <!-- flickity -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <link href="css/app.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
    <div id="app" class="page page--index">
        <div class="container">
            <?php include ("./partials/_mob-menu.html") ?>
            <?php include ("./partials/_header--shadow.html") ?>
            <section class="page-content">
                <?php include ("./partials/_slider.html") ?>

                <aside class="page-sitebar news-sitebar">
                    <div class="news-list">
                        <h2 class="page-title news-list__title">новость дня
                            <i class="far fa-thumbtack page-title__icon-pin"></i>
                        </h2>
                        <?php include ("./partials/_news-item.html") ?>
                    </div>  
                </aside>
                <main class="page-main">
                    <div class="article-list hidden-sitebar">
                        <h2 class="page-title">новость дня
                            <i class="far fa-thumbtack page-title__icon-pin"></i>
                        </h2>
                        <?php include ("./partials/_article-prew.php") ?>
                    </div>
                    <div class="article-list">
                        <h2 class="page-title page-title--labeled article-list__title">Последние новости
                            <a class="button button--small page-title__btn" href="#">Все новости</a>
                        </h2>

                        <?php include ("./partials/_article-prew.php") ?>
                        <?php include ("./partials/_article-prew.php") ?>
                        <?php include ("./partials/_article-prew.php") ?>

                        <a href="#" class="button button--small article-list__btn">Все новости</a>
                    </div>
                </main>
                <aside class="page-sitebar events-sitebar">
                    <div class="events-list">
                        <h2 class="page-title events-list__title">Мероприятия</h2>
                        <?php include ("./partials/_news-item-sm.html") ?>
                        <?php include ("./partials/_news-item-sm.html") ?>
                        <?php include ("./partials/_news-item-sm.html") ?>    
                    </div>  
                </aside>
            </section>

            <?php include ("./partials/_footer.html") ?>
        </div>
    </div>

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script type="module" src="./js/index.js"></script>
</body>
</html>