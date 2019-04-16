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
    <!-- flickity -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <link href="css/app.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
    <div id="app" class="page page--home">
        <div class="container container--shadow">
            <?php include ("./partials/_header.html") ?>
            <?php include ("./partials/_breadcrumbs.html") ?>
        </div>
        <div class="container container--shadow">
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

            <?php include ("./partials/_footer.html") ?>
        </div>
    </div>

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <?php include ("./partials/_inline-scripts.html") ?>
</body>
</html>