<?php

namespace app\model;

use app\core\Model;

class ProductModel
{
    private $_pdo;

    public function __construct()
    {
        $this->_pdo = new Model();
    }

    public function insert(Object $params)
    {
        $sql = 'INSERT INTO products (name, image, description) VALUES (:name, :image, :description)';

        $params = [
            ':name' => $params->name,
            ':image' => $params->image,
            ':description' => $params->description,
        ];

        if (!$this->_pdo->executeNonQuery($sql, $params)) {
            return -1;
        }

        return $this->_pdo->getLastID();
    }

    public function update(Object $params)
    {
        $sql = 'UPDATE products SET name = :name, image = :image, \
            description = :description WHERE id = :id';

        $params = [
            ':id' => $params->id,
            ':name' => $params->name,
            ':image' => $params->image,
            ':description' => $params->description,
        ];

        return $this->_pdo->executeNonQuery($sql, $params);
    }

    public function getAll()
    {
        $sql = 'SELECT id, name, image, description FROM products ORDER BY name ASC';

        $dt = $this->_pdo->executeQuery($sql);

        $productsList = null;

        foreach ($dt as $dr) {
            $productsList[] = $this->_collection($dr);
        }

        return $productsList;
    }

    public function getById(int $id)
    {
        $sql = 'SELECT id, name, image, description FROM products WHERE id = :id';

        $param = [
            ':id' => $id,
        ];

        $dr = $this->_pdo->executeQueryOneRow($sql, $param);

        return $this->_collection($dr);
    }

    private function _collection($param)
    {
        return (object)[
            'id' => $param['id'] ?? null,
            'name' => $param['name'] ?? null,
            'image' => $param['image'] ?? null,
            'description' => $param['description'] ?? null,
        ];
    }
}
