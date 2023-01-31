<?php

namespace app\controller;

use app\core\Controller;
use app\classes\Input;

class ProductsController extends Controller
{
    /**
     * Carrega a página principal
     *
     * @return void
     */
    public function index()
    {
        $this->load('products/main');
    }

    /**
     * Carrega a página que contém o formulário para cadastrar
     * novos produtos.
     *
     * @return void
     */
    public function new()
    {
        $this->load('products/new');
    }

    /**
     * Carrega a página com o produto cadastrado.
     *
     * @return void
     */
    public function insert()
    {
        $params = $this->getInput();

        dd($params);
    }

    /**
     * Realiza a busca na base de dados e exibe na página de
     * resultados.
     *
     * @return void
     */
    public function search()
    {
        $param = Input::get('sh');

        $this->load('products/search', [
            'param' => $param
            ]
        );
    }

    public function getInput()
    {
        return (object)[
            'id'          => Input::get('id', FILTER_SANITIZE_NUMBER_INT),
            'title'       => Input::post('txtTitle'),
            'image'       => Input::post('txtImage'),
            'description' => Input::post('txtDescription'),
        ];
    }
}
