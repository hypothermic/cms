<?php

//include_once "../databaseobject.php";

class Product extends DatabaseObject {

    public $StockItemID;
    public $StockItemName;

    public $SupplierID;
    public $ColorID;
    public $UnitPackageID;
    public $OuterPackageID;
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
    public $InternalComments;
    public $Photo;
    public $CustomFields;
    public $Tags;
    public $SearchDetails;
    public $LastEditedBy;
    public $ValidFrom;
    public $ValidTo;

    public function __construct($db) {
        parent::__construct($db, "stockitems");
    }

    public function readAll() {
        $query = "SELECT
                      p.StockItemID, p.StockItemName, p.SupplierID
                  FROM
                      " . $this->table_name . " p";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function readWithLimit($limit) {
        if (!is_int($limit) || $limit < 1) {
            throw new \mysql_xdevapi\Exception("Limit must be a valid integer larger than 0.");
        }

        $query = "SELECT
                      p.StockItemID, p.StockItemName, p.SupplierID
                  FROM
                      " . $this->table_name . " p
                  LIMIT $limit";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}

/*, p.ColorID, p.UnitPackageID, p.OuterPackageID,
                      p.Brand, p.Size, p.LeadTimeDays, p.QuantityPerOuter, p.IsChillerStock, p.Barcode, p.TaxRate,
                      p.UnitPrice, p.RecommendedRetailPrice, p.TypicalWeightPerUnit, p.MarketingComments, p.InternalComments,
                      p.Photo, p.CustomFields, p.Tags, p.SearchDetails, p.LastEditedBy, p.ValidFrom, p.ValidTo*/

?>
