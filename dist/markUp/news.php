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

    <link href="css/app.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
    <div id="app" class="page page--news">
        <div class="container">
            <?php include ("./partials/_header.html") ?>
            <?php include ("./partials/_breadcrumbs.html") ?>
            <section class="page-content">
                <main class="page-main">
                    <div class="article-list">
                        <h1 class="page-title-h1">Новости лицея</h1>
                        <?php include ("./partials/_article-prew.html") ?>
                        <?php include ("./partials/_article-prew.html") ?>
                        <?php include ("./partials/_article-prew.html") ?>
                        <?php include ("./partials/_article-prew.html") ?>
                    </div> 
                    <?php include ("./partials/_pagination.html") ?>                   
                </main>
                <aside class="page-sitebar">
                    <?php include ("./partials/_arhive-list.html") ?>  
                    <?php include ("./partials/_arhive-list.html") ?>  
                    <?php include ("./partials/_arhive-list.html") ?> 
                </aside>
            </section>
            
            <?php include ("./partials/_footer.html") ?>
        </div>
    </div>

    <script type="module" src="./js/index.js"></script>
</body>
</html>