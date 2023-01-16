<?php

namespace App\Contracts;

interface CategoriaRepositoryInterface
{

    public function getAll();    
    public function create(array $data);
    public function update(array $data, $id);
    // public function destroy($id);
    // public function paginate($pages);
    // public function find($id);
    // public function findOneBy(array $criteria);
    // public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);

}
