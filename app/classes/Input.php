<?php

namespace app\classes;

class Input
{

    /**
     * Returns a value via get params.
     *
     * @param string $param
     * @param int    $filter
     *
     * @return mixed
     */
    public static function get(
        string $param,
        int $filter = FILTER_SANITIZE_STRING
    ) {
        return filter_input(INPUT_GET, $param, $filter);
    }

    /**
     * Returns a value via post params.
     *
     * @param string $param
     * @param int    $filter
     *
     * @return mixed
     */
    public static function post(
        string $param,
        int $filter = FILTER_SANITIZE_STRING
    ) {
        return filter_input(INPUT_POST, $param, $filter);
    }
}
