<?php

namespace app\controller;

use app\core\Controller;
use app\model\ProductModel;
use app\classes\Input;

class ProductsController extends Controller
{
    private $_productModel;

    public function __construct()
    {
        $this->_productModel = new ProductModel();
    }

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
        $product = $this->getInput();

        if (!$this->_validate($product, false)) {
            return $this->showMessage(
                'Invalid form...',
                'Informed data is invalid.',
                BASE . 'new-product/',
                422
            );
        }

        $result = $this->_productModel->insert($product);

        if ($result <= 0) {
            echo 'Error when trying to insert product.';
            die;
        }

        redirect(BASE . 'edit-product/' . $result);
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
            'name'       => Input::post('txtName'),
            'image'       => Input::post('txtImage'),
            'description' => Input::post('txtDescription'),
        ];
    }

    private function _validate(Object $product, bool $validateId = true)
    {
        if ($validateId && $product->id <= 0) {
            return false;
        }

        if (strlen($product->name) < 3) {
            return false;
        }

        if (strlen($product->image) < 5) {
            return false;
        }

        if (strlen($product->description) < 10) {
            return false;
        }

        return true;
    }
}
