<?php

namespace app\controller;

use app\core\Controller;
use app\classes\Input;

class SearchController extends Controller
{
    public function search()
    {
        $param = Input::get('sh');

        $this->load('search/main', [
            'param' => $param
        ]);
    }
}
