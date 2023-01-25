<?php

/**
 * Implements pages controller.
 * php version 8.1
 *
 * @category Pages.
 * @package  Mini_Framework_MVC
 * @author   Edson Pimenta <edson.tibo@gmail.com>
 * @license  MIT ; see LICENSE
 * @link     https://github.com/eddyyxxyy/mini-framework-mvc-php
 */

namespace app\controller;

use app\core\Controller;

/**
 * Controller control page accesses.
 *
 * @category Pages.
 * @package  Mini_Framework_MVC
 * @author   Edson Pimenta <edson.tibo@gmail.com>
 * @license  MIT ; see LICENSE
 * @link     https://github.com/eddyyxxyy/mini-framework-mvc-php
 */
class PagesController extends Controller
{
    /**
     * Uses `app\core\Controller->load()`.
     *
     * Loads the home page view.
     *
     * @return void
     */
    public function home()
    {
        $this->load('home/main');
    }

    /**
     * Uses `app\core\Controller->load()`.
     *
     * Loads the zipcode page view.
     *
     * @return void
     */
    public function zipcode()
    {
        $this->load('zipcode/main');
    }

    /**
     * Uses `app\core\Controller->load()`.
     *
     * Loads the about us page view.
     *
     * @return void
     */
    public function aboutUs()
    {
        $this->load('about_us/main');
    }

    /**
     * Uses `app\core\Controller->load()`.
     *
     * Loads the meta page view.
     *
     * @return void
     */
    public function meta()
    {
        $this->load('meta/main');
    }
}
