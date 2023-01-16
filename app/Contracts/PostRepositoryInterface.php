<?php

namespace App\Contracts;

interface PostRepositoryInterface
{

    public function getAll();
    public function create(array $data);
    public function update(array $data, $id);
    public function destroy($id);
    public function paginate($pages);
    public function find($id);

}
