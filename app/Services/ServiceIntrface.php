<?php

namespace App\Services;
interface ServiceInterface{
    public function all();
    function find(int $id);
    function create(array $data);
    function update(array $data, $id);
    function delete($id);
 }
