<?php
// Uit deze php bestanden gebruiken wij functies of variabelen:
include_once("app/vendor.php");          // wordt gebruikt voor website beschrijving
include_once("app/database.php");        // wordt gebruikt voor database connectie
include_once("app/databaseobject.php");  // wordt gebruikt voor object-oriented database programmeren
include_once("app/model/categorie.php"); // wordt gebruikt voor categorieen ophalen uit DB
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">

        <!-- De beschrijving en eigenschappen van deze pagina -->
        <title><?php echo VENDOR_NAME ?></title>
        <meta name="description" content="<?php echo VENDOR_DESCRIPTION ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="<?php echo VENDOR_THEME_COLOR_PRIMARY?>">
        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">

        <!-- Normalize hebben we nodig voor het schoonmaken van pagina zodat het er in alle browsers hetzelfde uit ziet -->
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/main.css.php">

        <!-- Alle JavaScript dependencies-->
        <script src="js/vendor/modernizr-3.7.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <!-- Onze website werkt niet met Internet Explorer 9 en lager-->
        <!--[if IE]>
            <div id="warning" class="fixed-top"><p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please upgrade your browser to improve your experience and security.</p></div>
        <![endif]-->

        <!-- Binnen deze tags komt de inhoud van deze webpagina. -->
        <div class="root-container">

            <!-- Header menu -->
            <div id="header">

                <!-- Dit gedeelte van de header komt in een lijn te staan met de body content -->
                <div id="header-inline" class="responsive-container">
                    <div id="promotie">
                        <img src="img/logo/small-250x90.png" alt="Logo">
                    </div>
                </div>

                <!-- Navigatie balk -->
                <div id="navigatie">
                    <a href="categorie.php?id=">Home</a>
                    <a href="#news">News</a>
                    <a href="#contact">Contact</a>
                    <?php
                    // Verkrijg categorieen uit database
                    $stmt = (new Categorie((new Database())->getConnection()))->read();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        // Print een HTML element met de naam en een link naar de pagina
                        printf("<div><a href=\"categorie.php?id=%s\">%s</a></div>", $StockGroupID, $StockGroupName);
                    }
                    ?>
                </div>

            </div>

            <!-- Inhoud pagina -->
            <div class="content">

                <?php

                // Vul ff tijdelijk met line breaks zodat we kunnen scrollen
                for ($i = 0; $i < 100; $i++) {
                    print ("<br />");
                }

                ?>

            </div>

        </div>
    </body>
</html>
