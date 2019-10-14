<?php

while (!file_exists('config.php') )
    chdir('..');

include_once "config.php";

include_once "fear/database.php";
include_once "fear/databaseobject.php";
include_once "fear/attributeobject.php";
include_once "fear/page.php";

include_once "model/category.php";

?>