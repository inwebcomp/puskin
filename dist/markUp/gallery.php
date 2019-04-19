<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1">

    <title>Puskin - gallery</title>
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
    <div id="app" class="page page--gallery">
        <div class="container">
            <?php include ("./partials/_header.html") ?>
            <?php include ("./partials/_breadcrumbs.html") ?>
            <section class="page-content">
                <main class="gallery">
                    <h2 class="page-title-h2 gallery__title">Фотоальбом</h2>

                    <div class="gallery__list">
                        <?php include ("./partials/_album-prew.html") ?>
                        <?php include ("./partials/_album-prew.html") ?>
                        <?php include ("./partials/_album-prew.html") ?>
                        <?php include ("./partials/_album-prew.html") ?>
                        <?php include ("./partials/_album-prew.html") ?>
                    </div>
                </main>
            </section>

            <?php include ("./partials/_footer.html") ?>
        </div>
    </div>

    <script type="module" src="./js/index.js"></script>
</body>
</html>