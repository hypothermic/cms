<?php

//include_once "../databaseobject.php";

class Product extends DatabaseObject {

    public $StockItemID;
    public $StockItemName;

    public $SupplierName;

    public $ColorName;

    public $UnitPackageTypeName;
    public $OuterPackageTypeName;

    public $Brand;
    public $Size;
    public $LeadTimeDays;
    public $QuantityPerOuter;
    public $IsChillerStock;
    public $Barcode;
    public $TaxRate;
    public $UnitPrice;
    public $RecommendedRetailPrice;
    public $TypicalWeightPerUnit;
    public $MarketingComments;
    protected $InternalComments;
    public $Photo;
    public $CustomFields;
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
