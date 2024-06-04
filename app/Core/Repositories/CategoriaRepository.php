<?php

namespace App\Core\Repositories;

interface CategoriaRepository {

    public function findById(int $id);
    public function getAll();
    public function create($categoriaData);
    public function update($id, $categoriaData);
    public function delete($id);
}