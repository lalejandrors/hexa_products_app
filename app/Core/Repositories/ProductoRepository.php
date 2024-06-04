<?php

namespace App\Core\Repositories;

interface ProductoRepository {

    public function findById(int $id);
    public function getAll();
    public function create($productoData);
    public function update($id, $productoData);
    public function delete($id);

    public function findByIdCategoria(int $id);
    public function findByPrecio(int $from, int $to);
    public function getListaPrecio(int $limit);
}