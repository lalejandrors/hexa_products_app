<?php

namespace App\Application\UseCases\Producto;

use App\Core\Repositories\ProductoRepository;

class CreateProductoUseCase {
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function execute($producto) {
        return $this->productoRepository->create($producto);
    }
}