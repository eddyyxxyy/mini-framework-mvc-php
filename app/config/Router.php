<?php

/**
 * Implements Router page config.
 * php version 8.1
 *
 * @category Config.
 * @package  Mini_Framework_MVC
 * @author   Edson Pimenta <edson.tibo@gmail.com>
 * @license  MIT ; see LICENSE
 * @link     https://github.com/eddyyxxyy/mini-framework-mvc-php
 */

$this->get(
    '/',
    function () {
        (new \app\controller\TestController)->index();
    }
);

$this->get('/category', 'TestController@seta');

$this->get(
    '/about/test',
    function () {
        echo 'Estou na about/test!';
    }
);
