<?php

class DatabaseObject {

    protected $connection;
    protected $table_name;

    public function __construct($db, $table_name) {
        $this->connection = $db;
        $this->table_name = $table_name;
    }
}

?>
