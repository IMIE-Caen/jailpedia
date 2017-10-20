<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="/images/favicon.ico" />
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
        <script src="/js/script.js"></script>
        <META name="description" content="Un wiki sur les prisons.">
        <META name="keywords" content="wiki, prison, prisonniers, célèbre, europe, amérique, cellule, douche, savonnette">
        <title>JAILPEDIA - Un wiki sur les prisons - Ne faites pas tomber la savonnette</title>
        <link rel="stylesheet" href="/css/select2-bootstrap.css">
        <link rel="stylesheet" href="/css/style.css">

    </head>
    <body>
        <?php include("header.html.php"); ?>
        <?php include("menu.html.php"); ?>
        <div class="content container">
            <?php echo $page_content ?>
        </div>
        <div class="loading-div"></div>
        <div id="results"><!-- content will be loaded here --></div>
        <?php include("footer.html.php"); ?>
    </body>
    <?php
  ?>
</html>
