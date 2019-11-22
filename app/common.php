<?php

/**
 * Print een error message in JSON notatie, en exit daarna.
 *
 * @param int $code HTTP response code
 * @param string $message JSON error message
 *
 * @return void
 */
function respond_error($code = 404, $message = "Error") {
    http_response_code($code);

    // Encode de array naar json en print hem
    print(json_encode(
        array(
            "return"  => "error",
            "error"   => "1",
            "message" => "$message"
        )
    ));

    // Exit met foutstatus
    exit(1);
}

/**
 * Print een array in JSON notatie, en exit daarna.
 *
 * @param int $code
 * @param array $array
 *
 * @return void
 */
function respond_array($code = 200, $array = null) {
    http_response_code($code);

    // Encode de array naar json en print hem
    print(json_encode(
        array(
            "return" => "array",
            "array"  => $array
        )
    ));

    // Exit met "succes" status
    exit(0);
}
