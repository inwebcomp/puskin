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
        <div class="container container--shadow">
            <?php include ("./partials/_header.html") ?>
        </div>
        <div class="container container--shadow">
            <section class="page-content">
                <?php include ("./partials/_slider.html") ?>

                <aside class="page-sitebar">
                    <div class="news-list">
                        <h2 class="page-title news-list__title">новость дня
                            <i class="far fa-thumbtack page-title__icon-pin"></i>
                        </h2>
                        <?php include ("./partials/_news-item.html") ?>
                    </div>  
                </aside>

                <main class="page-main">
                    <div class="article-list">
                        <h2 class="page-title page-title--labeled article-list__title">Последние новости
                            <a class="button button--small page-title__btn" href="#">Все новости</a>
                        </h2>

                        <?php include ("./partials/_article-prew.html") ?>
                        
                        <article class="article-prew">
                            <div class="article-prew__photo">
                                <img src="https://xaxa-net.ru/uploads/posts/2018-03/1522233561_perfekcionizm_xaxa-net.ru-10.jpg" alt="post-photo" class="article-prew__photo-img">
                            </div>
                            
                            <div class="article-prew__content">
                                <h3 class="article-prew__title">Лицей организовывает поездку во францию. 26 июня - 2 июля.</h3>
                                <div class="article-prew__info">
                                    <span class="article-prew__date">
                                        <i class="fal fa-calendar-alt article-prew__info-icon"></i>
                                        09.06.2019
                                    </span>
                                    <span class="article-prew__comments">
                                        <i class="fal fa-comment-lines article-prew__info-icon"></i>
                                        Комментариев:
                                        <span class="article-prew__comments-count">9</span>
                                    </span>
                                </div>
                                <p class="article-prew__text">
                                    Экскурсия по Парижу. Мы посетим Триумфальную Арку, Эйфелеву башню, Лувр, Нотр-Дам-де-Пари. Остановимся в отеле Shangri-La Hotel Paris. Заказаны 4 лимузина.
                                </p>
                                <a href="#" class="article-prew__link">
                                    Подробнее
                                    <i class="fal fa-long-arrow-right article-prew__link-icon"></i>
                                </a>
                            </div>
                        </article>

                        <?php include ("./partials/_article-prew.html") ?>

                        <a href="#" class="button button--small article-list__btn">Все новости</a>
                    </div>
                </main>

                <aside class="aside">
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