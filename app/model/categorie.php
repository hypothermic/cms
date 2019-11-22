<?php

class Categorie {

    public const TABLE_NAME = "stockgroups";

    /**
     * Leest alle categorieeen uit de database. <br /> <br />
     *
     * Hier zit geen limiet op omdat er maar enkele categorieeen bestaan.
     *
     * @param PDO      $database   Een database connectie object (verkrijg met Database::getConnectie();)
     *
     * @return PDOStatement
     */
    public static function read($database) {
        $query = "SELECT
                      c.StockGroupID, c.StockGroupName, c.LastEditedBy, c.ValidFrom, c.ValidTo
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
