<?php
/**
 * Implements the core Router.
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
 * Implements the core Router.
 *
 * @category Core
 * @package  Mini_Framework_MVC
 * @author   Edson Pimenta <edson.tibo@gmail.com>
 * @license  MIT ; see LICENSE
 * @link     https://github.com/eddyyxxyy/mini-framework-mvc-php
 */
class RouterCore
{
    private $_uri;
    private $_method;
    private $_getArr = [];

    public function __construct()
    {
        $this->_initialize();
        include_once '../app/config/Router.php';
        $this->_execute();
    }

    /**
     * Gets the route and uses `_normalizeURI` to build uri.
     *
     * @return void
     */
    private function _initialize()
    {
        $this->_method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        if (strpos($uri, '?')) {
            $uri = mb_substr(
                $uri, 0,
                strpos($uri, '?')
            );
        }

        $ex = explode('/', $uri);

        $uri = $this->_normalizeURI($ex);

        for ($i = 0; $i < UNSET_URI_COUNT; $i++) {
            unset($uri[$i]);
        }

        $this->_uri = implode('/', $this->_normalizeURI($uri));

        if (DEBUG_URI) {
            dd($this->_uri);
        }
    }

    private function _get($router, $call)
    {
        $this->_getArr[] = [
            'router' => $router,
            'call' => $call,
        ];
    }

    private function _post($router, $call)
    {
        $this->_getArr[] = [
            'router' => $router,
            'call' => $call,
        ];
    }

    private function _execute()
    {
        switch($this->_method) {
        case 'GET':
            $this->_executeGet();
            return;
        case 'POST':
            $this->_executePost();
            return;
        }
    }

    private function _executeGet()
    {
        foreach ($this->_getArr as $get) {

            $r = substr($get['router'], 1);

            if ($r == $this->_uri) {
                if (is_callable($get['call'])) {
                    $get['call']();
                    return;
                }
                $this->_executeController($get['call']);
            }
        }
    }


    private function _executePost()
    {
        foreach ($this->_getArr as $post) {

            $r = substr($post['router'], 1);

            if ($r == $this->_uri) {
                if (is_callable($post['call'])) {
                    $post['call']();
                    return;
                }
                $this->_executeController($post['call']);
            }
        }
    }

    private function _executeController($get)
    {
        $ex = explode('@', $get);
        if (!isset($ex[0]) || !isset($ex[1])) {
            (new \app\controller\MessageController)->message(
                'Page not found',
                'Controller or method not found: ' . $get,
                404
            );
            return;
        }

        $cont = 'app\\controller\\' . $ex[0];
        if (!class_exists($cont)) {
            (new \app\controller\MessageController)->message(
                'Page not found',
                'Controller not found: ' . $get,
                404
            );
            return;
        }

        if (!method_exists($cont, $ex[1])) {
            (new \app\controller\MessageController)->message(
                'Page not found',
                'Method not found: ' . $get,
                404
            );
            return;
        }

        call_user_func_array([new $cont, $ex[1]], []);
    }

    private function _normalizeURI($arr)
    {
        return array_values(array_filter($arr));
    }
}
