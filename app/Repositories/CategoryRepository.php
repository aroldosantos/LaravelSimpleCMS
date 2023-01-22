<?php

/**
 * @author      Aroldo de Moura Santos
 * @copyright   2023 Aroldo de Moura Santos
 * @license     GPL-3.0 license
 * @link        https://github.com/aroldosantos/LaravelSimpleCMS
 */

namespace App\Repositories;

use App\Contracts\CategoryRepositoryInterface;
use App\Models\Category;
use App\Repositories\AbstractRepository;

/**
 * Class CategoryRepository AbstractRepository
 */
class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    /**
     * CategoriaRepository constructor
     * @param Category $model
     */
    public function __construct(
        protected Category $model
    ) {}

}
