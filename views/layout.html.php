<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="/images/favicon.ico" />
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <title>JAILPEDIA - INDEX</title>
        <link rel="stylesheet" href="/css/select2-bootstrap.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <?php include("header.html.php"); ?>
        <?php include("menu.html.php"); ?>
        <div class="content container">
            <?php echo $page_content ?>
        </div>
        <?php include("footer.html.php"); ?>

    </body>
    <?php
    if($_SESSION['connecte']==true){
        echo('connecte');
    }
    else{
        echo('pas co');
    }
    ?>
</html>
