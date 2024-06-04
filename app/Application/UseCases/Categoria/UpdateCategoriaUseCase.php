<?php

namespace App\Application\UseCases\Categoria;

use App\Core\Repositories\CategoriaRepository;

class UpdateCategoriaUseCase {
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function execute($id, $categoriaData) {
        return $this->categoriaRepository->update($id, $categoriaData);
    }
}