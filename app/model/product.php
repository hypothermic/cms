<?php

class Product {

    public const TABLE_NAME = "stockitems";

    /**
     * Leest alle producten uit de database.
     *
     * @param PDO $database
     * @param int $limit Hoeveel producten er gereturned moeten worden. (default en max values staan in constants.php)
     * @return PDOStatement
     */
    public static function read($database, $limit = 1000) {
        // Als limiet geen integer is, of niet binnen de grenzen valt, wordt de standaard limiet gehanteerd.
        if (filter_var($limit, FILTER_VALIDATE_INT) === false
            || $limit < MIN_PRODUCT_RETURN_AMOUNT
            || $limit > MAX_PRODUCT_RETURN_AMOUNT) {

            $limit = DEFAULT_PRODUCT_RETURN_AMOUNT;
        }

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
    }
    /**
     * Leest alle producten uit de database.
     *
     * @param PDO $database
     * @param int $limit Hoeveel producten er gereturned moeten worden. (default en max values staan in constants.php)
     * @return PDOStatement
     */
    public static function zoek($database, $limit = 1000, $zoekterm) {
        // Als limiet geen integer is, of niet binnen de grenzen valt, wordt de standaard limiet gehanteerd.
        if (filter_var($limit, FILTER_VALIDATE_INT) === false
            || $limit < MIN_PRODUCT_RETURN_AMOUNT
            || $limit > MAX_PRODUCT_RETURN_AMOUNT) {

            $limit = DEFAULT_PRODUCT_RETURN_AMOUNT;
        }

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
                  WHERE p.StockItemName LIKE '%$zoekterm%'
                  
                  LIMIT $limit";

        $stmt = $database->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    /** Interne ID van dit product*/
    public $StockItemID;
    /** Naam van dit product*/
    public $StockItemName;

    /** Naam van de leverancier */
    public $SupplierName;

    /** Kleur van dit product (Black, Red, Blue, etc.) */
    public $ColorName;

    /** Verpakking om elk product (plastic folie, bubbeltjesplastic, etc.)*/
    public $UnitPackageTypeName;
    /** Buitenverpakking (kartonnen doos, pellet, etc.)*/
    public $OuterPackageTypeName;

    /** Merk van dit product, kan leeg zijn of NULL zijn */
    public $Brand;
    /** Fysieke grootte van het product (100mm, 20cm, etc.) */
    public $Size;
    /** Hoeveel dagen voordat het leverbaar is */
    public $LeadTimeDays;
    /** Hoeveel producten kunnen er in een outer package? Zie $OuterPackageTypeName */
    public $QuantityPerOuter;
    /** Of het product in de diepvries ligt */
    public $IsChillerStock;
    /** Barcode voor dit product */
    public $Barcode;

    /** Aantal belasting (in procenten) dat moet worden toegevoegd */
    public $TaxRate;
    /** Verkoopprijs aan leveranciers van dit product (excl. belasting)*/
    public $UnitPrice;
    /** Verkoopprijs aan klanten van dit product (incl. belasting)*/
    public $RecommendedRetailPrice;

    /** Gewicht per product (incl. verpakking)*/
    public $TypicalWeightPerUnit;
    /** Marketing opmerkingen over dit product (wordt gedeeld buiten de organisatie) */
    public $MarketingComments;
    /** Interne opmerkingen over dit product (wordt niet gedeeld buiten de organisatie) */
    protected $InternalComments;
    /** Foto van dit product*/
    public $Photo;
    /** JSON met custom fields */
    public $CustomFields;
    /** Advertising tags voor dit product (zitten ook in customfields) */
    public $Tags;
    protected $SearchDetails;

    protected $LastEditedBy;
    protected $ValidFrom;
    protected $ValidTo;

    public function __construct() {

    }
}

?>
