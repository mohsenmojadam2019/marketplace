<?php
namespace marketplace\src\Repositories;

use marketplace\src\Eloquent\Repository;
use marketplace\src\Repositories\Interfaces\HelloRepositoryInterface;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->model->find($id);
        if (!$record) {
            return false;
        }

        $record->update($data);

        return $record;
    }

    public function delete($id)
    {
        $record = $this->model->find($id);
        if (!$record) {
            return false;
        }

        return $record->delete();
    }
}