<?php

/**
 * @author      Aroldo de Moura Santos
 * @copyright   2023 Aroldo de Moura Santos
 * @license     GPL-3.0 license
 * @link        https://github.com/aroldosantos/LaravelSimpleCMS
 */

namespace App\Repositories;

use App\Contracts\PostRepositoryInterface;
use App\Models\Post;
use App\Repositories\AbstractRepository;

/**
 * Class PostRepository AbstractRepository
 */
class PostRepository extends AbstractRepository implements PostRepositoryInterface
{
    /**
     * PostRepository constructor
     * @param Post $model
     */
    public function __construct(
        protected Post $model
    ) {}

}
