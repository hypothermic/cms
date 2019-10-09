<?php

//include_once "../databaseobject.php";

class Categorie extends DatabaseObject {

    /** Interne ID van deze categorie */
    public $StockGroupID;
    /** Naam van deze categorie */
    public $StockGroupName;

    protected $LastEditedBy;
    protected $ValidFrom;
    protected $ValidTo;

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
