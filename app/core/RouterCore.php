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

    private function _execute()
    {
        switch($this->_method) {
        case 'GET':
            $this->_executeGet();
            break;
        case 'POST':

            break;
        }
    }

    private function _executeGet()
    {
        foreach ($this->_getArr as $get) {

            $r = substr($get['router'], 1);

            if ($r == $this->_uri) {
                if (is_callable($get['call'])) {
                    $get['call']();
                    break;
                }
            }
        }
    }

    private function _normalizeURI($arr)
    {
        return array_values(array_filter($arr));
    }
}
