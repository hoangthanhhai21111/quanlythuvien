<?php
namespace App\Repositories\Author;

use App\Models\Author;
use App\Repositories\BaseRepository;

class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface{
    public function getmodel(){
        return Author::class;
    }
    function create(array $data)
    {
        $Author = $this->model;
        $Author->name = $data['name'];
        return  $Author->save();
    }
    function update(array $data, $id)
    {
        $Author = $this->model->findOrFail($id);
        $Author->name = $data['name'];
        return  $Author->save();
    }
}

