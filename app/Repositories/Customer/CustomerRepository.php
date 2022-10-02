<?php
namespace App\Repositories\Customer;
use App\Models\Customer;
use App\Repositories\BaseRepository;


 class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface{
    public function getmodel(){
        return Customer::class;
    }
    function create(array $data){
        $customers = $this->model;
        $customers->name = $data['name'];
        $customers->phone = $data['phone'];
        $customers->email = $data['email'];
        $customers->address = $data['address'];
        $customers->password =bcrypt($data['password']);
        $customers->save();
        return $customers;
    }
    function update(array $data, $id)
    {
        $customers = $this->model->findOrFail($id);
        $customers->name = $data['name'];
        $customers->phone = $data['phone'];
        $customers->email = $data['email'];
        $customers->address = $data['address'];
        $customers->password =bcrypt($data['password']);
        return $customers->save();
    }
  }

