<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1">

    <title>Puskin - classes</title>
    <base href="../">

    <link rel="shortcut icon" href="img/favicons/favicon.ico">

    <!-- temporal connection for fast reload-->
    <link rel="stylesheet" href="fonts/fas/css/fontawesome.min.css">
    <link rel="stylesheet" href="fonts/fas/css/solid.min.css">
    <link rel="stylesheet" href="fonts/fas/css/light.min.css">
    <link rel="stylesheet" href="fonts/fas/css/regular.min.css">
    <link rel="stylesheet" href="fonts/fas/css/brands.min.css">

    <link href="css/app.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
    <div id="app" class="page page--classes">
        <div class="container">
            <?php include ("./partials/_header.html") ?>
            <?php include ("./partials/_breadcrumbs.html") ?>
            <section class="page-content">  
                <div class="classes">
                    <h1 class="page-title-h1 classes__title">Классы</h1>
                    <div class="classes__row">
                        <a href="#" class="classes__item">
                            <h3 class="classes__item-name">
                                12A класс
                                <span class="classes__item-count">15 учеников</span>
                            </h3>
                            <p class="classes__item-info">
                                <span class="classes__item-key">Классный руководитель:</span>
                                <span class="classes__item-value">Том Круз</span>
                            </p>
                            <p class="classes__item-info">
                                <span class="classes__item-key">Сейчас идёт урок:</span>
                                <span class="classes__item-value">Иностранный язык (10 каб.)</span>
                            </p>
                            <span class="link-arrow pseudo classes__link">
                                Страница класса
                            </span>
                        </a>
                        <a href="#" class="classes__item">
                            <h3 class="classes__item-name">
                                12A класс
                                <span class="classes__item-count">15 учеников</span>
                            </h3>
                            <p class="classes__item-info">
                                <span class="classes__item-key">Классный руководитель:</span>
                                <span class="classes__item-value">Том Круз</span>
                            </p>
                            <p class="classes__item-info">
                                <span class="classes__item-key">Сейчас идёт урок:</span>
                                <span class="classes__item-value">Иностранный язык (10 каб.)</span>
                            </p>
                            <span class="link-arrow pseudo classes__link">
                                Страница класса
                            </span>
                        </a>
                    </div>
                    <div class="classes__row">
                        <a href="#" class="classes__item">
                            <h3 class="classes__item-name">
                                12A класс
                                <span class="classes__item-count">15 учеников</span>
                            </h3>
                            <p class="classes__item-info">
                                <span class="classes__item-key">Классный руководитель:</span>
                                <span class="classes__item-value">Том Круз</span>
                            </p>
                            <p class="classes__item-info">
                                <span class="classes__item-key">Сейчас идёт урок:</span>
                                <span class="classes__item-value">Иностранный язык (10 каб.)</span>
                            </p>
                            <span class="link-arrow pseudo classes__link">
                                Страница класса
                            </span>
                        </a>
                    </div>
                </div>
            </section>
            <?php include ("./partials/_other-news-list.php") ?>

            <?php include ("./partials/_footer.html") ?>
        </div>
    </div>

    <script type="module" src="./js/index.js"></script>
</body>
</html>