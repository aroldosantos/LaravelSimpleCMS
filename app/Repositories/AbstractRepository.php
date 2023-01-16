<?php

/**
 * @author      Aroldo de Moura Santos
 * @copyright   2023 Aroldo de Moura Santos
 * @license     GPL-3.0 license
 * @link        https://github.com/aroldosantos/LaravelSimpleCMS
 */

namespace App\Repositories;

/**
 * Class AbstractRepository
 */
abstract class AbstractRepository
{
    /**
     * GetAll method
     *
     * Returns all models
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Find method
     * @param int $id
     *
     * Find a specific model
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create Model
     * @param array $data
     *
     * Create a new model with the information received
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update method
     * @param array $data
     * @param int $id
     *
     * Update a specific model with the information received
     */
    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * Destroy method
     * @param int $id
     *
     * Delete a specific model
     */
    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * Paginate method
     * @param int $pages
     *
     * Result pagination
     */
    public function paginate($pages)
    {
        return $this->model->paginate($pages);
    }

}
