<?php
namespace App\Repositories\Position;

use App\Models\Position;
use App\Repositories\BaseRepository;

class PositionRepository extends BaseRepository implements PositionRepositoryInterface{
    public function getmodel(){
        return Position::class;
    }
    function create(array $data)
    {
        $position = $this->model;
        $position->name = $data['name'];
        return  $position->save();
    }
    function update(array $data, $id)
    {
        $position = $this->model->findOrFail($id);
        $position->name = $data['name'];
        return  $position->save();
    }
}

