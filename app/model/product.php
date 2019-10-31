<?php

//include_once "../databaseobject.php";

class Product extends DatabaseObject {

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

    public function __construct($db) {
        parent::__construct($db, "stockitems");
    }

    public function readAll() {
        $query = "SELECT
                      p.StockItemID, p.StockItemName, s.SupplierName, c.ColorName, u.PackageTypeName UnitPackageTypeName, o.PackageTypeName OuterPackageTypeName,
                      p.Brand, p.Size, p.LeadTimeDays, p.QuantityPerOuter, p.IsChillerStock, p.Barcode, p.TaxRate, p.UnitPrice, p.RecommendedRetailPrice,
                      p.TypicalWeightPerUnit, p.MarketingComments, p.InternalComments, p.Photo, p.CustomFields, p.Tags, p.SearchDetails,
                      p.LastEditedBy, p.ValidFrom, p.ValidTo
                  FROM
                      " . $this->table_name . " p
                  JOIN suppliers s    ON p.SupplierID     = s.SupplierID
                  JOIN colors c       ON p.ColorID        = c.ColorID
                  JOIN packagetypes u ON p.UnitPackageID  = u.PackageTypeID
                  JOIN packagetypes o ON p.OuterPackageID = o.PackageTypeID";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function readWithLimit($limit) {
        if (!is_int($limit) || $limit < 1) {
            throw new \mysql_xdevapi\Exception("Limit must be a valid integer larger than 0.");
        }

        $query = "SELECT
                      p.StockItemID, p.StockItemName, s.SupplierName, c.ColorName, u.PackageTypeName UnitPackageTypeName, o.PackageTypeName OuterPackageTypeName,
                      p.Brand, p.Size, p.LeadTimeDays, p.QuantityPerOuter, p.IsChillerStock, p.Barcode, p.TaxRate, p.UnitPrice, p.RecommendedRetailPrice,
                      p.TypicalWeightPerUnit, p.MarketingComments, p.InternalComments, p.Photo, p.CustomFields, p.Tags, p.SearchDetails,
                      p.LastEditedBy, p.ValidFrom, p.ValidTo
                  FROM
                      " . $this->table_name . " p
                  JOIN suppliers s ON p.SupplierID = s.SupplierID
                  JOIN colors c ON p.ColorID = c.ColorID
                  JOIN packagetypes u ON p.UnitPackageID = u.PackageTypeID
                  JOIN packagetypes o ON p.OuterPackageID = o.PackageTypeID
                  LIMIT $limit";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}

?>
