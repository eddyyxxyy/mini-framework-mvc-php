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
$this->_get('/about-us', 'PagesController@aboutUs');
$this->_get('/meta', 'PagesController@meta');

$this->_get('/products', 'ProductsController@index');
$this->_get('/new-product', 'ProductsController@new');
$this->_post('/insert-product', 'ProductsController@insert');

$this->_get('/search', 'ProductsController@search');
