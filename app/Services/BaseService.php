<?php

namespace App\Services;

abstract class BaseService implements ServiceInterface
{
    protected $model;
    public function __construct()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    abstract public function getModel();
    function all()
    {
        return $this->model->paginate(10);
    }
    function find(int $id)
    {
        return $this->model->findOrFail($id);
    }
    function create(array $data)
    {
        return $this->model->create($data);
    }
    function update(array $data, $id)
    {
        $object = $this->model->find($id);
        return $object->update($data);
    }
    function delete($id)
    {
        $object = $this->model->find($id);
        return $object->delete();
    }
}
