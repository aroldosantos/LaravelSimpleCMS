<?php

/**
 * @author      Aroldo de Moura Santos
 * @copyright   2023 Aroldo de Moura Santos
 * @license     GPL-3.0 license
 * @link        https://github.com/aroldosantos/LaravelSimpleCMS
 */

namespace App\Repositories;

use App\Contracts\CategoriaRepositoryInterface;
use App\Models\Categoria;
use App\Repositories\AbstractRepository;

/**
 * Class CategoriaRepository AbstractRepository
 */
class CategoriaRepository extends AbstractRepository implements CategoriaRepositoryInterface
{
    /**
     * CategoriaRepository constructor
     * @param Categoria $model
     */
    public function __construct(
        protected Categoria $model
    ) {}

}
