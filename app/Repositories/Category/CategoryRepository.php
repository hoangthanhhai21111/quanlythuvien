<?php
namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface{
    public function getmodel(){
        return Category::class;
    }
    function create(array $data)
    {
        $Category = $this->model;
        $Category->name = $data['name'];
        return  $Category->save();
    }
    function update(array $data, $id)
    {
        $Category = $this->model->findOrFail($id);
        $Category->name = $data['name'];
        return  $Category->save();
    }
}

