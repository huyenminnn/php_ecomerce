<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    //return model
    abstract public function getModel();

    public function getAll()
    {
        return $this->model->all();
    }

    //findById
    public function findById($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function findOrFail($id)
    {
        $result = $this->model->findOrFail($id);

        return $result;
    }

    public function find($data = [])
    {
        $result = $this->model->where($data)->get();

        return $result;
    }

    public function findFirst($data = [])
    {
        $result = $this->model->where($data)->first();

        return $result;
    }

    public function create($data = [])
    {
        return $this->model->create($data);
    }

    public function update($obj, $data = [])
    {
        if ($obj) {
            $obj->update($data);

            return $obj;
        }

        return false;
    }

    public function destroy($id)
    {
        $result = $this->findById($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
