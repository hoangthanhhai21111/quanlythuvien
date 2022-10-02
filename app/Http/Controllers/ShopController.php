<?php

namespace App\Http\Controllers;

use App\Models\shop;
use App\Repositories\Shop\ShopRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    private $ShopRepository;
    public function __construct(ShopRepository $ShopRepository)
    {
        $this->ShopRepository = $ShopRepository;
    }
    public function index()
    {
        $this->authorize('viewAny',shop::class);
        $shops = $this->ShopRepository->all();
        return view('Shops.index', compact('shops'));
    }
    public function create()
    {
        $this->authorize('create',shop::class);
        return view('Shops.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'hotline' => 'required',
            'address' => 'required',
        ]);
        $data = $request->all();
        $this->ShopRepository->create($data);
        $notification = array(
            'message' => 'Thêm danh mục thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('shop.index')->with($notification);
    }
    public function show($id)
    {
        $this->authorize('view',shop::class);
        $shop = shop::find($id);
        return view('Shops.show', compact('shop'));
    }
    public function edit($id)
    {
        $this->authorize('update',shop::class);
        $shop = $this->ShopRepository->find($id);
        return view('Shops.edit', compact('shop'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'hotline' => 'required',
            'address' => 'required',
        ]);
        $notification = array(
            'message' => 'Cập nhật thành công',
            'alert-type' => 'success'
        );
        $data = $request->all();
        $this->ShopRepository->update($data, $id);
        return redirect()->route('shop.index')->with( $notification);
    }
    public function destroy($id)
    {
        try {
            $this->ShopRepository->delete($id);
            return response()->json('ok', 200);
        } catch (Exception $e) {
            Log::error(' loi' . $e->getMessage() . ' ở file ' . $e->getFile() . ' dòng ' . $e->getLine());
            return response()->json('errors', 500);
        }
    }
}
