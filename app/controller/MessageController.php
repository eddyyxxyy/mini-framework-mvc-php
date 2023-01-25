<?php

/**
 * Implements the message controller.
 * php version 8.1
 *
 * It's called when the page doesn't exist.
 *
 * @category Message.
 * @package  Mini_Framework_MVC
 * @author   Edson Pimenta <edson.tibo@gmail.com>
 * @license  MIT ; see LICENSE
 * @link     https://github.com/eddyyxxyy/mini-framework-mvc-php
 */

namespace app\controller;

use app\core\Controller;

/**
 * Controller to show if the page doesn't exist.
 *
 * @category Message.
 * @package  Mini_Framework_MVC
 * @author   Edson Pimenta <edson.tibo@gmail.com>
 * @license  MIT ; see LICENSE
 * @link     https://github.com/eddyyxxyy/mini-framework-mvc-php
 */
class MessageController extends Controller
{
    public function message(string $title, string $message, int $code = 404)
    {
        http_response_code($code);
        $this->load('message/main', [
            'title' => $title,
            'message' => $message
        ]);
    }
}
