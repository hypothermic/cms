<?php

include_once '../../app/database.php';
include_once '../../app/databaseobject.php';
include_once '../../app/model/categorie.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$product = new Categorie($db);

// mysql query
$stmt = $product->read();
$num = $stmt->rowCount();

// >1 categorie gevonden in database
if ($num > 0) {

    $result = array("record_name" => "categories");
    $result["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $item = array(
            "id"           => $StockGroupID,
            "name"         => $StockGroupName,
            "last_edited"  => $LastEditedBy,
            "valid_from"   => $ValidFrom,
            "valid_to"     => $ValidTo
        );

        array_push($result["records"], $item);
    }

    // return categorieen
    http_response_code(200);
    print(json_encode(
        array(
            "return" => "array",
            "array"   => $result
        )
    ));

// geen categorieeen gevonden, error.
} else {

    http_response_code(404);
    print(json_encode(
        array(
            "return"  => "error",
            "error"   => "1",
            "message" => "No categories found."
        )
    ));
}

?>
