<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\Producto;
use App\Core\Repositories\ProductoRepository;

class EloquentProductoRepository implements ProductoRepository {

    public function findById(int $id) {
        return Producto::with('categorias')->find($id);
    }

    public function getAll() {
        return Producto::with('categorias')->get();
    }

    public function create($productoData) {
        $producto = new Producto([
            'nombre' => $productoData->nombre,
            'precio' => $productoData->precio,
            'stock' => $productoData->stock,
        ]);

        //$producto->created_at = '';
        $producto->save();

        return $producto;
    }

    public function update($id, $productoData) {
        $producto = Producto::findOrFail($id);

        $producto->nombre = $productoData->nombre;
        $producto->precio = $productoData->precio;
        $producto->stock = $productoData->stock;
        $producto->save();

        return $producto;
    }

    public function delete($id) {
        $producto = Producto::findOrFail($id);

        $producto->delete();
        return $producto;
    }

    public function findByIdCategoria(int $id) {
        return Producto::whereHas('categorias', function($query) use ($id){
            $query->where('id_categoria', '=', $id);
        })->get();
    }

    public function findByPrecio(int $from, int $to) {
        return Producto::with('categorias')->whereBetween('precio', [$from, $to])->get();
    }

    public function getListaPrecio(int $limit) {
        return Producto::where('stock', '>', $limit)->get();
    }
}