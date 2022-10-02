<?php
namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\BaseRepository;

class BookRepository extends BaseRepository implements BookRepositoryInterface{
    public function getmodel(){
        return Book::class;
    }
    function create(array $data)
    {
        $Book = $this->model;
        $Book->name = $data['name'];

        return  $Book->save();
    }
    function update(array $data, $id)
    {
        $Book = $this->model->findOrFail($id);
        $Book->name = $data['name'];
        return  $Book->save();
    }
}

