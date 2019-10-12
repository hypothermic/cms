<?php

include_once '../../../../api/category/get.php';
include_once '../../../../fear/include.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$categories = getCategories();

if (count($categories) > 0) {

    $result = array();
    $result["records"] = array();

    foreach ($categories as $category) {
        if ($category->isActive()) {
            $item = array(
                "id" => $category->id,
                "key" => $category->key,
                "name" => $category->name,
                "description" => $category->description,
                "active" => $category->active,
                "mode" => $category->mode,
                "created" => $category->created,
                "modified" => $category->modified,
            );

            array_push($result["records"], $item);
        }
    }

    http_response_code(200);
    print(json_encode(
        array(
            "return" => "array",
            "array"   => $result
        )
    ));

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
