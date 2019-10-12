<?php

include_once "../fear/databaseobject.php";

class Category extends DatabaseObject {

    /** Internal ID, unique for each category */
    public $id;

    /** URL Key,             ex.: "tablets-and-smartphones" */
    public $key;
    /** User-Friendly name,  ex.: "Tablets and Smartphones" */
    public $name;

    /** Is active/visible? TRUE/FALSE */
    public $active;
    /** Not used yet. */
    public $mode;

    public function __construct($db) {
        parent::__construct($db, "Category");
    }

    public function read() {
        $query = "SELECT
                      c.id, c.key, c.name, c.active, c.mode
                  FROM
                      " . $this->table_name . " c";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}

?>
