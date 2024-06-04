<?php

namespace App\Application\UseCases\Categoria;

use App\Core\Repositories\CategoriaRepository;

class CreateCategoriaUseCase {
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function execute($categoria) {
        return $this->categoriaRepository->create($categoria);
    }
}