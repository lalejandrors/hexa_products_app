<?php

namespace App\Application\UseCases\Producto;

use App\Core\Repositories\ProductoRepository;

class GetProductoByPrecioUseCase {
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function execute(int $from, int $to) {
        return $this->productoRepository->findByPrecio($from, $to);
    }
}