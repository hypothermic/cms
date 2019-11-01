/* Voeg hier CSS toe */

<?
// Uit vendor.php zijn we de constanten nodig.
include_once "../app/vendor.php";

// Geef aan dat dit als CSS geintepreteerd moet worden
header('Content-Type: text/css');
?>

#navigatie {
    background: <? echo VENDOR_THEME_COLOR_PRIMARY ?>;
    padding: 30px;
    min-height: 240px;
    height: 240px;
    max-height: 240px;
}
