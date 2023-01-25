<?php

/**
 * Implements a test controller.
 * php version 8.1
 *
 * @category Test.
 * @package  Mini_Framework_MVC
 * @author   Edson Pimenta <edson.tibo@gmail.com>
 * @license  MIT ; see LICENSE
 * @link     https://github.com/eddyyxxyy/mini-framework-mvc-php
 */

namespace app\controller;

use app\core\Controller;

/**
 * Controller to test if the app is calling controllers.
 *
 * @category Test.
 * @package  Mini_Framework_MVC
 * @author   Edson Pimenta <edson.tibo@gmail.com>
 * @license  MIT ; see LICENSE
 * @link     https://github.com/eddyyxxyy/mini-framework-mvc-php
 */
class TestController extends Controller
{
    /**
     * Uses `app\core\Controller->load()`.
     *
     * Loads the home page view.
     *
     * @return void
     */
    public function index()
    {
        $this->load(
            'home/main', [
                'name' => 'Edson Pimenta',
            ]
        );
    }
}
