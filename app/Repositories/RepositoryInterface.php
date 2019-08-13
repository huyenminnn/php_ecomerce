<?php

namespace App\Repositories;

/**
 * Interface BaseRepositoryInterface
 *
 * @package App\Repositories
 */
interface RepositoryInterface
{
    public function getAll();

    public function findById($id);

    public function findOrFail($id);

    public function find($data = []);

    public function findFirst($data = []);

    public function create($data = []);

    public function update($id, $data);

    public function destroy($id);
}
