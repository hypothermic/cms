<?php

// TODO maak singleton?? https://stackoverflow.com/a/37800033/9107324
class Database {

    private $host = "localhost";
    private $database = "cms";

    private $username = "api-local";
    private $password = "";

    private $connection;

    public function getConnection() {
        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->connection->exec("set names utf8");
            printf("Connect success");
        } catch (PDOException $exception) {
            error_log("Connection error: " . $exception->getMessage());
            printf("Connect failed %s", $exception->getMessage());
        }

        return $this->connection;
    }
}

?>
