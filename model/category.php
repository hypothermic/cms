<?php

namespace Fear\Model;
class Category extends \Fear\Core\AttributeObject {

    public const TABLE_NAME = "Category";

    public static function read($connection) {
        $query = "SELECT
                      c.id, c.key, c.name, c.description, c.active, c.mode, c.created, c.modified
                  FROM
                      " . self::TABLE_NAME . " c";

        $stmt = $connection->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    /** Internal ID, unique for each category */
    public $id;

    /** URL Key,                   ex.: "tablets-and-smartphones" */
    public $key;
    /** User-Friendly name,        ex.: "Tablets and Smartphones" */
    public $name;
    /** User-Friendly description, ex.: "These are our best handhelds!" */
    public $description;

    /** Is active/visible? TRUE/FALSE */
    public $active;
    /** Not used yet. */
    public $mode;

    //public $last_editor; // TODO user object
    public $created,
           $modified;

    public function __construct($connection) {
        parent::__construct($connection, self::TABLE_NAME);
    }

    public function isActive() : bool {
        return $this->active === "1";
    }

    public static function fromData($connection, $id, $key, $name, $description, $active, $mode, $created, $modified) {
        $result = new Category($connection);
        $result->id = $id;
        $result->key = $key;
        $result->name = $name;
        $result->description = $description;
        $result->active = $active;
        $result->mode = $mode;
        $result->created = $created;
        $result->modified = $modified;
        return $result;
    }
}

?>
