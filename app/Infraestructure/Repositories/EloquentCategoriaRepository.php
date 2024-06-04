<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\Categoria;
use App\Core\Repositories\CategoriaRepository;

class EloquentCategoriaRepository implements CategoriaRepository {

    public function findById(int $id) {
        return Categoria::find($id);
    }

    public function getAll() {
        return Categoria::all();
    }

    public function create($categoriaData) {
        $categoria = new Categoria([
            'nombre' => $categoriaData->nombre,
        ]);

        //$categoria->created_at = '';
        $categoria->save();

        return $categoria;
    }

    public function update($id, $categoriaData) {
        $categoria = Categoria::findOrFail($id);

        $categoria->nombre = $categoriaData->nombre;
        $categoria->save();

        return $categoria;
    }

    public function delete($id) {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();
        return $categoria;
    }
}