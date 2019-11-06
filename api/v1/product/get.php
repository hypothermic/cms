<?php

include_once '../../../app/common.php';
include_once '../../../app/constants.php';
include_once '../../../app/database.php';
include_once '../../../app/databaseobject.php';
include_once '../../../app/model/product.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Verkrijg database connectie object.
$db = Database::getConnection();

// als database niet online is, of ./db/setup.sql nog niet uitgevoerd is.
if (is_null($db)) {
    respond_error(503, "Error connecting with database.");
}

// initialize object
$product = new Product($db);

// laat user aantal producten bepalen // TODO limit met api key ???
$limit = DEFAULT_PRODUCT_RETURN_AMOUNT;
if (isset($_GET["limit"])) {
    $limit = (int) $_GET["limit"];
}

// mysql query
$stmt = $product->readWithLimit($limit);
$num = $stmt->rowCount();

// 1 of meer producten product gevonden in database
if ($num > 0) {

    $result = array("record_name" => "product");
    $result["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        // Protected fields (alleen voor intern gebruik) worden NIET vrijgegeven hieronder:
        $item = array(
            "id"                 => $StockItemID,
            "name"               => $StockItemName,
            "supplier"           => $SupplierName,
            "color"              => $ColorName,
            "package_unit"       => $UnitPackageTypeName,
            "package_outer"      => $OuterPackageTypeName,
            "qty_per_outer"      => $QuantityPerOuter,
            "brand"              => $Brand,
            "size"               => $Size,
            "lead_time"          => $LeadTimeDays,
            "is_chill"           => $IsChillerStock,
            "barcode"            => $Barcode,
            "tax"                => $TaxRate,
            "price_unit"         => $UnitPrice,
            "price_recommended"  => $RecommendedRetailPrice,
            "weight"             => $TypicalWeightPerUnit,
            "comments_marketing" => $MarketingComments,
            "photo"              => $Photo,
            "custom_fields"      => $CustomFields,
            "tags"               => $Tags,
        );

        array_push($result["records"], $item);
    }

    // return producten
    respond_array(200, $result);

// geen producten gevonden, error.
} else {
    respond_error(404, "No products found.");
}

?>
