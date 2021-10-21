<!DOCTYPE html>
<?php

use Base\Router;

ini_set('error_log', 'php_errors.log');
require_once('./autoload.php');
?>

<html lang="pt-BR" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Marvel Lucas</title>
        <link rel="stylesheet" type="text/css" href="view/css/marvel.css" />
        <link rel="stylesheet" type="text/css" href="view/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="view/css/fontawesome/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="view/css/izitoast.min.css" />
        <script type="text/javascript" src="view/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="view/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="view/js/izitoast.min.js"></script>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">Marvel Lucas</a>
        </nav>
    </head>
    <body>
        <div class="container">
            <?php Router::run($_REQUEST); ?>
        </div>
    </body>
</html>