<?php

$this->get('/', function() {
    (new \app\controller\TestController)->index();
});

$this->get('/about/test', function() {
    echo 'Estou na about/test!';
});

$this->get('/category', 'TestController@seta');
