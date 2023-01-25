<?php

/**
 * Implements the core controller.
 * php version 8.1
 *
 * @category Core
 * @package  Mini_Framework_MVC
 * @author   Edson Pimenta <edson.tibo@gmail.com>
 * @license  MIT ; see LICENSE
 * @link     https://github.com/eddyyxxyy/mini-framework-mvc-php
 */

namespace app\core;

/**
 * Core Controller class.
 *
 * @category Core
 * @package  Mini_Framework_MVC
 * @author   Edson Pimenta <edson.tibo@gmail.com>
 * @license  MIT ; see LICENSE
 * @link     https://github.com/eddyyxxyy/mini-framework-mvc-php
 */
class Controller
{
    /**
     * Implements twig to render views.
     *
     * @param string $view   View to be shown.
     * @param array  $params Don't know yet.
     *
     * @return void
     */
    protected function load(string $view, $params = [])
    {
        $twig = new \Twig\Environment(
            new \Twig\Loader\FilesystemLoader('../app/view/')
        );

        $twig->addGlobal('BASE', BASE);
        echo $twig->render($view . '.twig.php', $params);
    }
}
