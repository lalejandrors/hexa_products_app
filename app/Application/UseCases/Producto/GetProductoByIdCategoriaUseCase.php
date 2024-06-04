<?php

namespace App\Application\UseCases\Producto;

use App\Core\Repositories\ProductoRepository;

class GetProductoByIdCategoriaUseCase {
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function execute(int $id) {
        return $this->productoRepository->findByIdCategoria($id);
    }
}