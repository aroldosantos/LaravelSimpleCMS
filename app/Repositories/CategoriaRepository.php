<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Categoria;
use App\Contracts\CategoriaRepositoryInterface;
use App\Repositories\AbstractRepository;

class CategoriaRepository extends AbstractRepository implements CategoriaRepositoryInterface
{
    
    public function __construct(
        protected Categoria $model
    ) {}

}
 