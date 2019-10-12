<?php
/**
 * Respond with an error message.
 * @param int $code HTTP response code
 * @param string $message JSON error message
 * @return void
 */
function respond_error($code = 404, $message = "Error") {
    http_response_code($code);
    print(json_encode(
        array(
            "return"  => "error",
            "error"   => "1",
            "message" => "$message"
        )
    ));
    exit(1);
}
/**
 * Respond with array
 * @param int $code
 * @param array $array
 */
function respond_array($code = 200, $array) {
    http_response_code($code);
    print(json_encode(
        array(
            "return" => "array",
            "array"  => $array
        )
    ));
    exit(0);
}

?>