<?php
namespace App\Repositories\User;

use App\Models\position;
use App\Models\shop;
use App\Models\User;
use App\Repositories\BaseRepository;
 class UserRepository extends BaseRepository implements UserRepositoryInterface{
    public function getmodel(){
        return User::class;
    }
    public function all(){
       return User::orderBy('id', 'DESC')->paginate(10);
    }
    function create(array $data){
        $users = $this->model;
        $users->name = $data['name'];
        $users->phone = $data['phone'];
        $users->gender = 'male';
        $users->email = $data['email'];
        $users->address = $data['address'];
        $users->day_of_birth = $data['day_of_birth'];
        $users->position_id = $data['position'];
        $users->shop_id = $data['shop'];
        $users->password = bcrypt('admin');
        if ($data['image']) {
            $file = $data['image'];
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $data['image']->store('images', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $users->image = $path;
        }
        $users->save();
        return $users;
    }
    function Edit($id){
         $shop = shop::all();
         $position = position::all();
         $user = User::find($id);
       $param = [
        'shop' => $shop,
        'position' => $position,
        'user' => $user,
       ];
       return $param;
    }
    function update(array $data, $id)
    {
        $users = $this->model->findOrFail($id);
        $users->name = $data['name'];
        $users->phone = $data['phone'];
        $users->gender = 'male';
        $users->email = $data['email'];
        $users->address = $data['address'];
        $users->day_of_birth = $data['day_of_birth'];
        $users->position_id = $data['position'];
        $users->shop_id = $data['shop'];
        $users->password = bcrypt('admin');
        if (!empty($data['image'])) {
            $file = $data['image'];
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $data['image']->store('images', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $users->image = $path;
        }
      return $users->save();
    }
  }

