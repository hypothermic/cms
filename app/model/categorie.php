<?php

//include_once "../databaseobject.php";

class Categorie extends DatabaseObject {

    /** Interne ID, uniek voor elke categorie */
    public $id;

    /** URL Key,             ex.: "tablets-en-smartphones" */
    public $key;
    /** User-Friendly naam,  ex.: "Tablets en Smartphones" */
    public $name;

    /** Is actief/zichtbaar? TRUE/FALSE */
    public $active;
    /** Wordt nog niet gebruikt */
    public $mode;

    public function __construct($db) {
        parent::__construct($db, "Categorie");
    }

    public function read() {
        $query = "SELECT
                      c.id, c.key, c.name, c.active, c.mode
                  FROM
                      " . $this->table_name . " c";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}

?>
