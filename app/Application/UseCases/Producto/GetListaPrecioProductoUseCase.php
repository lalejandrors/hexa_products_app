<?php

namespace App\Application\UseCases\Producto;

use App\Core\Repositories\ProductoRepository;

class GetListaPrecioProductoUseCase {
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function execute(int $limit) {
        return $this->productoRepository->getListaPrecio($limit);
    }
}