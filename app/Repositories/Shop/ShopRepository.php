<?php
namespace App\Repositories\Shop;

use App\Models\shop;
use App\Repositories\BaseRepository;

class ShopRepository extends BaseRepository implements ShopRepositoryInterface{
    public function getmodel(){
        return shop::class;
    }
    function create(array $data)
    {
        $shop = $this->model;
        $shop->name = $data['name'];
        $shop->address = $data['address'];
        $shop->hotline = $data['hotline'];
        $shop->email = $data['email'];
        if ($data['image']) {
            $file = $data['image'];
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $data['image']->store('images', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $shop->image = $path;
        }
        return  $shop->save();
    }
    function update(array $data, $id)
    {
        $shop = $this->model->findOrFail($id);
        $shop->name = $data['name'];
        $shop->address = $data['address'];
        $shop->hotline = $data['hotline'];
        $shop->email = $data['email'];
        if (!empty($data['image'])) {
            $file = $data['image'];
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $data['image']->store('images', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $shop->image = $path;
        }
        return  $shop->save();
    }
}

