<?php

class Categorie {

    public const TABLE_NAME = "stockgroups";

    /**
     * Leest alle categorieeen uit de database.
     *
     * @param PDO $database
     * @return PDOStatement
     */
    public static function read($database) {
        $query = "SELECT
                      c.StockGroupID, c.StockGroupName, c.LastEditedBy, c.ValidFrom, C.ValidTo
                  FROM
                      " . self::TABLE_NAME . " c";

        $stmt = $database->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    /** Interne ID van deze categorie */
    public $StockGroupID;
    /** Naam van deze categorie */
    public $StockGroupName;

    protected $LastEditedBy;
    protected $ValidFrom;
    protected $ValidTo;

    public function __construct() {

    }
}

?>
