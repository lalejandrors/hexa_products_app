<?php

namespace App\Application\UseCases\Producto;

use App\Core\Repositories\ProductoRepository;

class DeleteProductoUseCase {
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function execute($id) {
        return $this->productoRepository->delete($id);
    }
}