<?php

namespace App\Application\UseCases\Categoria;

use App\Core\Repositories\CategoriaRepository;

class GetAllCategoriaUseCase {
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function execute() {
        return $this->categoriaRepository->getAll();
    }
}