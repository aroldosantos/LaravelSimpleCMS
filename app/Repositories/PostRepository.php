<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Post;
use App\Contracts\PostRepositoryInterface;
use App\Repositories\AbstractRepository;

class PostRepository extends AbstractRepository implements PostRepositoryInterface
{
    
    public function __construct(
        protected Post $model
    ) {}

}
 