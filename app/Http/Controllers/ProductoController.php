<?php

namespace App\Http\Controllers;

use App\Application\UseCases\Producto\CreateProductoUseCase;
use App\Application\UseCases\Producto\DeleteProductoUseCase;
use App\Application\UseCases\Producto\GetAllProductoUseCase;
use App\Application\UseCases\Producto\GetProductoByIdUseCase;
use App\Application\UseCases\Producto\GetProductoByIdCategoriaUseCase;
use App\Application\UseCases\Producto\GetProductoByPrecioUseCase;
use App\Application\UseCases\Producto\GetListaPrecioProductoUseCase;
use App\Application\UseCases\Producto\UpdateProductoUseCase;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(GetAllProductoUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function find(int $id, GetProductoByIdUseCase $useCase) {
        $producto = $useCase->execute($id);
        return $producto;
    }

    public function findByCategory(int $id, GetProductoByIdCategoriaUseCase $useCase) {
        $productos = $useCase->execute($id);
        return $productos;
    }

    public function findByPrice(int $from, int $to, GetProductoByPrecioUseCase $useCase) {
        $productos = $useCase->execute($from, $to);
        return $productos;
    }

    public function findPricesList(int $limit, GetListaPrecioProductoUseCase $useCase) {
        $productos = $useCase->execute($limit);
        return $productos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateProductoUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return $th;
            return response(["message" => 'Internal Server Error'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request, UpdateProductoUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, DeleteProductoUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }
}
