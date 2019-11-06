<?php

include_once '../../../app/common.php';
include_once '../../../app/constants.php';
include_once '../../../app/database.php';
include_once '../../../app/databaseobject.php';
include_once '../../../app/model/categorie.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Verkrijg database connectie object.
$db = Database::getConnection();

// als database niet online is, of ./db/setup.sql nog niet uitgevoerd is.
// om de exacte oorzaak te achterhalen, zet IS_DEBUGGING_ENABLED aan in constants.php!
if (is_null($db)) {
    respond_error(503, "Error connecting with database.");
}

// initialize object
$categorie = new Categorie($db);

// mysql query
$stmt = $categorie->read();
$num = $stmt->rowCount();

// 1 of meer categorieeen gevonden in database
if ($num > 0) {

    $result = array("record_name" => "categorie");
    $result["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        // Protected fields (alleen voor intern gebruik) worden NIET vrijgegeven hieronder (zie commented regels):
        $item = array(
            "id"           => $StockGroupID,
            "name"         => $StockGroupName,
            //"last_edited"  => $LastEditedBy,
            //"valid_from"   => $ValidFrom,
            //"valid_to"     => $ValidTo
        );

        array_push($result["records"], $item);
    }

    // return categorieen
    respond_array(200, $result);

// geen categorieeen gevonden, error.
} else {
    respond_error(404, "No categories found.");
}

?>
