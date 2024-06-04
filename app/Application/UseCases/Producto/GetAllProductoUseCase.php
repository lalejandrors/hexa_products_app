<?php

namespace App\Application\UseCases\Producto;

use App\Core\Repositories\ProductoRepository;

class GetAllProductoUseCase {
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function execute() {
        return $this->productoRepository->getAll();
    }
}