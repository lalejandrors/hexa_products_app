<?php

namespace App\Application\UseCases\Categoria;

use App\Core\Repositories\CategoriaRepository;

class GetCategoriaByIdUseCase {
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function execute(int $id) {
        return $this->categoriaRepository->findById($id);
    }
}