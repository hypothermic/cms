<?php

class DatabaseObject {

    protected $conn;
    protected $table_name;

    public function __construct($db, $table_name) {
        $this->conn = $db;
        $this->table_name = $table_name;
    }
}

?>
