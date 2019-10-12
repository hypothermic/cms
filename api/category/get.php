<?php

use Fear\Model\Category;

// When using this API, make sure everything is included! ex.:
//include_once '../../fear/include.php';

/**
 * @return Category[]
 */
function getCategories(): array {
    $result = [];

    $database = new Database();
    $connection = $database->getConnection();

    $stmt = Category::read($connection);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        array_push($result, Category::fromData($connection, $id, $key, $name, $description, $active, $mode, $created, $modified));
    }

    return $result;
}

?>
