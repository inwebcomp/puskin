<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1">

    <title>Puskin</title>
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
    <div id="app" class="page page--home">
        <div class="container">
            <?php include ("./partials/_header.html") ?>
            <section class="carousel carousel--large carousel--main">
                <div class="carousel__cell">
                    <img class="carousel__image" src="img/slider-img-lg.jpg"  data-flickity-lazyload="img/slider-img-lg.jpg">
                </div>
                <div class="carousel__cell">
                    <img class="carousel__image" data-flickity-lazyload="https://xaxa-net.ru/uploads/posts/2018-03/1522233561_perfekcionizm_xaxa-net.ru-10.jpg"  >
                </div>
                <div class="carousel__cell">
                    <img class="carousel__image" data-flickity-lazyload="https://bipbap.ru/wp-content/uploads/2017/06/tmb_145037_6611.jpg" >
                </div>
                <div class="carousel__cell">
                    <img class="carousel__image" data-flickity-lazyload="https://cdn.humoraf.ru/wp-content/uploads/2017/08/23-14.jpg"  alt="orange tree">
                </div>
            </section>
            <section class="page-content">
                <main class="page-main">
                    <div class="article-list">
                        <h2 class="page-title page-title--labeled article-list__title">Последние новости
                            <a class="button button--small page-title__btn" href="#">Все новости</a>
                        </h2>
                        <?php include ("./partials/_article-prew.html") ?>
                        <?php include ("./partials/_article-prew.html") ?>
                        <?php include ("./partials/_article-prew.html") ?>
                        <?php include ("./partials/_article-prew.html") ?>
                        <a href="#" class="button button--small article-list__btn">Все новости</a>
                    </div>
                </main>

                <aside class="page-sitebar">
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

    <?php include ("./partials/_inline-scripts.html") ?>
</body>
</html>