<?php

namespace app\controller;

use app\core\Controller;

class TestController extends Controller
{
    public function index()
    {
        $this->load('home/main', [
            'name' => 'Edson Pimenta',
        ]);
    }
}
