<?php

namespace App\Application\UseCases\Categoria;

use App\Core\Repositories\CategoriaRepository;

class DeleteCategoriaUseCase {
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function execute($id) {
        return $this->categoriaRepository->delete($id);
    }
}