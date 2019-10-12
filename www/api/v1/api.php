<?php

include_once "../../../config.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

http_response_code(200);

$client = array(
    "name" => CLIENT_NAME,
    "logo" => "img/logo/"
);

$result = array(
    "version" => "v1.0.0.0", // TODO
    "impl"    => "standard",
    "client"  => $client,
);

print(json_encode(
    array(
        "return"  => "info",
        "info"    => $result
    )
));
