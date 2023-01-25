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

$this->_get('/', 'PagesController@home');

$this->_get('/home', 'PagesController@home');

$this->_get('/zipcode', 'PagesController@zipcode');

$this->_get('/about-us', 'PagesController@aboutUs');

$this->_get('/meta', 'PagesController@meta');


