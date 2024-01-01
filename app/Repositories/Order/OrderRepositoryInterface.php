<?php
namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    // public function all();
    // function create(array $data);
    public function Edit($id);
}
