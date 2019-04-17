<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1">

    <title>Puskin - Text</title>
    <base href="../">

    <link rel="shortcut icon" href="img/favicons/favicon.ico">

    <!-- temporal connection for fast reload-->
    <link rel="stylesheet" href="fonts/fas/css/fontawesome.min.css">
    <link rel="stylesheet" href="fonts/fas/css/solid.min.css">
    <link rel="stylesheet" href="fonts/fas/css/light.min.css">
    <link rel="stylesheet" href="fonts/fas/css/regular.min.css">
    <link rel="stylesheet" href="fonts/fas/css/brands.min.css">
    <!-- flickity -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <link href="css/app.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
    <div id="app" class="page page--article">
        <div class="container">
            <header class="header">
                <a href="#" class="logo header__logo">
                    <img src="./img/icons/Logo.svg" alt="logo" class="logo__img">
                    <div class="logo__content">
                        <span class="logo__text">Теоретический лицей</span>
                        <p class="logo__name">им. А. С. Пушкина</p>
                        <span class="logo__city">г. Басарабяска</span>
                    </div>
                </a>
                <div class="header__right-box">
                    <div class="header__info">
                        <div class="header__contacts">
                            <a href="#" class="header__contact">
                                <i class="fas fa-map-marker-alt header__contact-icon"></i>
                                <span class="header__contact-text">ул. Набережная, 3</span>
                            </a>
                            <a href="tel:++37329721 998" class="header__contact">
                                <i class="fas fa-phone header__contact-icon"></i>
                                <span class="header__contact-text">+373 297 <b>21 998</b></span>
                            </a>
                        </div>
                        <nav class="languages">
                            <a href="" class="languages__item active">Русский</a>
                            <a href="" class="languages__item">Romana</a>
                        </nav>
                    </div>
                    <nav class="main-menu">
                        <div class="main-menu__item">
                            <a class="main-menu__link" href="#">Лицей</a>
                        </div>
                        <div class="main-menu__item">
                            <a class="main-menu__link" href="#">Учебный процесс</a>
                        </div>
                        <div class="main-menu__item active">
                            <a class="main-menu__link" href="#">Учителя</a>

                            <div class="drop-menu">
                                <a class="drop-menu__item" href="#">Пункт меню 1</a>
                                <a class="drop-menu__item" href="#">Длинный пункт меню</a>
                                <a class="drop-menu__item" href="#">Очень длинный пункт меню</a>
                                <a class="drop-menu__item" href="#">Пункт меню 4</a>
                            </div>
                        </div>
                        <div class="main-menu__item">
                            <a class="main-menu__link" href="#">Классы</a>

                            <div class="drop-menu">
                                    <a class="drop-menu__item" href="#">Пункт меню 1</a>
                                    <a class="drop-menu__item" href="#">Длинный пункт меню</a>
                                    <a class="drop-menu__item" href="#">Очень длинный пункт меню</a>
                                    <a class="drop-menu__item" href="#">Пункт меню 4</a>
                            </div>
                        </div>
                        <div class="main-menu__item">
                            <a class="main-menu__link" href="#">Мероприятия</a>
                        </div>
                        <div class="main-menu__item">
                            <a class="main-menu__link" href="#">Контакты</a>

                            <div class="drop-menu">
                                    <a class="drop-menu__item" href="#">Пункт меню 1</a>
                                    <a class="drop-menu__item" href="#">Длинный пункт меню</a>
                                    <a class="drop-menu__item" href="#">Очень длинный пункт меню</a>
                                    <a class="drop-menu__item" href="#">Пункт меню 4</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <?php include ("./partials/_breadcrumbs.html") ?>
            <section class="page-content">
                <main class="page-main">
                    <?php include ("partials/_article.php") ?>
                </main>

                <aside class="aside">
                    <div class="news-list">
                        <h2 class="page-title news-list__title">Мероприятия</h2>
                        <?php include ("./partials/_news-item.html") ?>
                    </div>  
                </aside>
            </section>
            <?php include ("./partials/_other-news-list.php") ?>

            <?php include ("./partials/_footer.html") ?>
        </div>
    </div>

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="./js/sticky.js"></script>

    <?php include ("./partials/_inline-scripts.html") ?>
</body>
</html>