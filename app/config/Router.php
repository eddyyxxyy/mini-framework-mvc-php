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

$this->_get(
    '/',
    function () {
        (new \app\controller\TestController)->index();
    }
);

$this->_get('/category', 'TestController@seta');

$this->_get(
    '/about/test',
    function () {
        echo 'Estou na about/test!';
    }
);
