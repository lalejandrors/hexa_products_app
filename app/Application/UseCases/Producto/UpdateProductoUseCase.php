<?php

namespace App\Application\UseCases\Producto;

use App\Core\Repositories\ProductoRepository;

class UpdateProductoUseCase {
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function execute($id, $productoData) {
        return $this->productoRepository->update($id, $productoData);
    }
}