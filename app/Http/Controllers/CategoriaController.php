<?php

namespace App\Http\Controllers;

use App\Application\UseCases\Categoria\CreateCategoriaUseCase;
use App\Application\UseCases\Categoria\DeleteCategoriaUseCase;
use App\Application\UseCases\Categoria\GetAllCategoriaUseCase;
use App\Application\UseCases\Categoria\GetCategoriaByIdUseCase;
use App\Application\UseCases\Categoria\UpdateCategoriaUseCase;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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

    public function index(GetAllCategoriaUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function find(int $id, GetCategoriaByIdUseCase $useCase) {
        $categoria = $useCase->execute($id);
        return $categoria;
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
    public function store(Request $request, CreateCategoriaUseCase $useCase)
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
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request, UpdateCategoriaUseCase $useCase)
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
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, DeleteCategoriaUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }
}
