<?php

include_once '../../app/database.php';
include_once '../../app/databaseobject.php';
include_once '../../app/model/product.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$product = new Product($db);

// laat user aantal producten bepalen // TODO limit met api key ???
$limit = 20;
if (isset($_GET["limit"])) {
    $limit = (int) $_GET["limit"];
}

// mysql query
$stmt = $product->readWithLimit($limit);
$num = $stmt->rowCount();

// >1 categorie gevonden in database
if ($num > 0) {

    $result = array("record_name" => "product");
    $result["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        // TODO join database and show supplier info i.p.v. id
        $item = array(
            "id"           => $StockItemID,
            "name"         => $StockItemName,
            "supplier_id"  => $SupplierID,
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
            "message" => "No products found."
        )
    ));
}

?>
