<?php

// TODO make singleton?? https://stackoverflow.com/a/37800033/9107324
class Database {

    private $connection;

    public function getConnection() {
        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host=" . DATABASE_HOST . ";dbname=" . DATABASE_NAME, DATABASE_USERNAME, DATABASE_PASSWORD);
            $this->connection->exec("set names utf8");
        } catch (PDOException $exception) {
            error_log("Connection error: " . $exception->getMessage());
        }

        if (DEBUG_ENABLED && $this->connection != null) {
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $this->connection;
    }
}

?>
