<?php

// TODO maak singleton?? https://stackoverflow.com/a/37800033/9107324
class Database {

    private const HOST = "localhost";
    private const DATABASE = "wideworldimporters";

    private const USERNAME = "api-local";
    private const PASSWORD = "";

    private $connection;

    public function getConnection() {
        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host=" . Database::HOST . ";dbname=" . Database::DATABASE, Database::USERNAME, Database::PASSWORD);
            $this->connection->exec("set names utf8");
        } catch (PDOException $exception) {
            error_log("Connection error: " . $exception->getMessage());
        }

        return $this->connection;
    }
}

?>
