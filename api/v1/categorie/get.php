<?php

// Include al onze benodigde php files
include_once '../../../app/common.php';
include_once '../../../app/constants.php';
include_once '../../../app/database.php';
include_once '../../../app/model/categorie.php';

// Laat de client weten dat we JSON-data geven
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Verkrijg database connectie object.
$database = Database::getConnection();

// Dit gebeurt als de database niet online is, of ./db/setup.sql nog niet uitgevoerd is.
// Om de exacte oorzaak te achterhalen, zet IS_DEBUGGING_ENABLED aan in constants.php!
if (is_null($database)) {
    respond_error(503, "Error connecting with database.");
}

// Voer de mysql query uit en verkrijg het prepared statement object.
$stmt = Categorie::read($database);

// Als er 1 of meer categorieeen gevonden zijn in de database
if ($stmt->rowCount()> 0) {

    $result = array("record_name" => "categorie");
    $result["records"] = array();

    // Zolang er resultaten zijn, append ze naar de $result array.
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

        // Voeg dit record toe aan de $result array.
        array_push($result["records"], $item);
    }

    // Return categorieen
    respond_array(200, $result);

// Geen categorieeen gevonden, geef een error.
} else {
    respond_error(404, "No categories found.");
}

?>
