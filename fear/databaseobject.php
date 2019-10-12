<?php

namespace Fear\Core;

class DatabaseObject {

    protected $connection;
    protected $table_name;

    public function __construct($connection, $table_name) {
        $this->connection = $connection;
        $this->table_name = $table_name;
    }
}

?>
