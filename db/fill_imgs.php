<?php

include_once "../app/model/product.php";
include_once "../app/database.php";
include_once "../app/constants.php";

// Verkrijg de connectie
$connectie = Database::getConnection();

// Encode naar base64
$base = base64_encode(file_get_contents("ditisjob.jpeg"));

// Update ALLE foto's in stockitems (vergeet where niet als je het nog verandert)
$query = 'UPDATE WideWorldImporters.stockitems SET Photo = "' . $base . '"';

// Voer de query uit
$stmt = $connectie->prepare($query);
$stmt->execute();
