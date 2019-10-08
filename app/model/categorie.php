<?php

//include_once "../databaseobject.php";

class Categorie extends DatabaseObject {

    public $StockGroupID;
    public $StockGroupName;

    public $LastEditedBy;
    public $ValidFrom;
    public $ValidTo;

    public function __construct($db) {
        parent::__construct($db, "stockgroups");
    }

    public function read() {
        $query = "SELECT
                      c.StockGroupID, c.StockGroupName, c.LastEditedBy, c.ValidFrom, C.ValidTo
                  FROM
                      " . $this->table_name . " c";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}

?>
