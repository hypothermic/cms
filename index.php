<?php
// Uit deze php bestanden gebruiken wij functies of variabelen:
include_once("app/vendor.php");          // wordt gebruikt voor website beschrijving
include_once("app/database.php");        // wordt gebruikt voor database connectie
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
        <link rel="stylesheet" type="text/css" href="css/header_footer.css.php">

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

        <!-- Hierin  -->
        <div id="pagina-container">

            <!-- Print de header (logo, navigatiebalken, etc.)-->
            <?php
                include("tpl/header_template.php");
            ?>

            <!-- Inhoud pagina -->
            <div class="content-container">
                <?php
                    if(isset($_POST['knop'])) {
                        $zoekterm = $_POST['search'];
                        $stmt = (Product::read(Database::getConnection(), 5));
                        $query = "SELECT
                              p.StockItemID, p.StockItemName, s.SupplierName, c.ColorName, u.PackageTypeName UnitPackageTypeName, o.PackageTypeName OuterPackageTypeName,
                              p.Brand, p.Size, p.LeadTimeDays, p.QuantityPerOuter, p.IsChillerStock, p.Barcode, p.TaxRate, p.UnitPrice, p.RecommendedRetailPrice,
                              p.TypicalWeightPerUnit, p.MarketingComments, p.InternalComments, p.Photo, p.CustomFields, p.Tags, p.SearchDetails,
                                  p.LastEditedBy, p.ValidFrom, p.ValidTo
                              FROM
                                  " . self::TABLE_NAME . " p
                              JOIN suppliers s ON p.SupplierID = s.SupplierID
                              JOIN colors c ON p.ColorID = c.ColorID
                              JOIN packagetypes u ON p.UnitPackageID = u.PackageTypeID
                              JOIN packagetypes o ON p.OuterPackageID = o.PackageTypeID
                            LIMIT $limit";

                        $stmt = $database->prepare($query);
                        $stmt->execute();
                        return $stmt;
                        /*
                         * HELP????
                         * Hier moet ik nog uitvinden hoe de fok ik een PDO connectie moet maken,
                        Als iemand hier even naar zou willen kijken (Matthijs denk ik) dan ga ik er morgen mee verder.
                        Nu moet ik bier drinken joejoe */
                    }
                ?>
        </div>
        <div class="footer-container">
            <?php
            //include("tpl/footer_template.php");
            ?>

        </div>
    </body>
</html>
