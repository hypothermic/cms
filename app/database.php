<?php

include_once "constants.php";

/**
 * Alle info over de database connectie met de MySQL server.<br /><br />
 *
 * Deze klasse is een <i>utility class</i>, wat betekent dat er van deze klasse geen instanties gemaakt kunnen worden.<br />
 * Gebruik `getConnection()` om het connectie object te verkrijgen.
 */
class Database {

    private const HOST = "localhost";
    private const DATABASE = "wideworldimporters";

    private const USERNAME = "api-local";
    private const PASSWORD = "";

    /**
     * Dit is het globale database connectie object.<br /><br />
     *
     * Verkrijg het via `getConnection()`.
     *
     * @var PDO
     */
    private static $connection = null;

    /**
     * Verkrijg het globale database connectie object.<br /><br />
     *
     * De connectie wordt aangemaakt als hij nog niet beschikbaar is.
     *
     * @return PDO
     */
    public static function getConnection() {
        // Als de connectie nog niet gemaakt is
        if (self::$connection == null) {
            // Gooi dit in een try-catch blok omdat PDO exceptions geeft
            try {
                // Verbind met de database via PDO
                self::$connection = new PDO("mysql:host=" . Database::HOST . ";dbname=" . Database::DATABASE, Database::USERNAME, Database::PASSWORD);
                // MySQL werkt default met ASCII dus geef aan dat we UTF-8 willen gebruiken.
                self::$connection->exec("set names utf8");
            } catch (PDOException $exception) {
                // Als de database server uit staat of ./db/setup.sql nog niet is gerund
                error_log("Connection error: " . $exception->getMessage());
            }

            // Als de debug modus aan staat, laat alle exceptions zien aan de gebruiker, anders niet.
            if (IS_DEBUGGING_ENABLED) {
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } else {
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            }
        }

        // Return het connectie object.
        return self::$connection;
    }

    /**
     * Van deze klasse mogen geen instanties gemaakt worden, dus maak de constructor privé.
     */
    private function __construct() {
        throw new AssertionError("Gebruik getConnection() !!!");
    }

    /**
     * Instanties van deze klasse mogen niet gekloond worden, dus maak clone() privé.
     */
    private function __clone() {
        throw new AssertionError("Het is niet toegestaan om deze klasse te klonen!");
    }
}

?>
