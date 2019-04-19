<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1">

    <title>Puskin - album</title>
    <base href="../">

    <link rel="shortcut icon" href="img/favicons/favicon.ico">

    <!-- temporal connection for fast reload-->
    <link rel="stylesheet" href="fonts/fas/css/fontawesome.min.css">
    <link rel="stylesheet" href="fonts/fas/css/solid.min.css">
    <link rel="stylesheet" href="fonts/fas/css/light.min.css">
    <link rel="stylesheet" href="fonts/fas/css/regular.min.css">
    <link rel="stylesheet" href="fonts/fas/css/brands.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="css/app.css" rel="stylesheet" type="text/css" />

    
</head>
<body>
    <div id="app" class="page page--album">
        <div class="container">
            <?php include ("./partials/_header.html") ?>
            <?php include ("./partials/_breadcrumbs.html") ?>
            <section class="page-content">
                <main class="album">
                    <a href="#" class="back-link album__back">
                        <i class="fal fa-long-arrow-left back-link__icon"></i>
                        К фотоальбому
                    </a>
                    <h2 class="page-title-h2 album__title">Поездка по Европе</h2>

                    <div class="album__list">
                        <a href="./img/slider-img.jpg" data-fancybox="gallery" class="album__item">
                            <img src="./img/article-img.jpg" alt="Фото" class="album__photo">
                        </a>
                        <a href="./img/slider-img-lg.jpg" data-fancybox="gallery" class="album__item">
                            <img src="./img/article-img.jpg" alt="Фото" class="album__photo">
                        </a>
                        <a href="./img/slider-img.jpg" data-fancybox="gallery" class="album__item">
                            <img src="./img/article-img.jpg" alt="Фото" class="album__photo">
                        </a>
                        <a href="./img/slider-img.jpg" data-fancybox="gallery" class="album__item">
                            <img src="./img/article-img.jpg" alt="Фото" class="album__photo">
                        </a>
                        <a href="./img/slider-img-lg.jpg" data-fancybox="gallery" class="album__item">
                            <img src="./img/article-img.jpg" alt="Фото" class="album__photo">
                        </a>
                        <a href="./img/slider-img.jpg" data-fancybox="gallery" class="album__item">
                            <img src="./img/article-img.jpg" alt="Фото" class="album__photo">
                        </a>
                    </div>
                </main>
            </section>

            <?php include ("./partials/_footer.html") ?>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script type="module" src="./js/index.js"></script>
</body>
</html>