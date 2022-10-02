<?php

namespace App\Http\Controllers;

use App\Models\position;
use App\Models\shop;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $users = $this->userRepository->all();
        return view('users.index', compact('users'));

        // return response()->json($users,200);
    }
    public function create()
    {
        $shop = shop::all();
        $position = position::all();
        return view('users.create', compact('shop', 'position'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'day_of_birth' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        $data = $request->all();
        $this->userRepository->create($data);
        $notification = array(
            'message' => 'Thêm danh mục' . $request->name . 'thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('user.index')->with($notification);
    }
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        return view('users.show', compact('user'));
    }
    public function edit($id)
    {
        $shop = shop::all();
        $position = position::all();
        $user = $this->userRepository->find($id);
        return view('users.edit', compact('user', 'position', 'shop'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'day_of_birth' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        $notification = array(
            'message' => 'Cập nhật thư mục' . $request->name . ' thành công',
            'alert-type' => 'success'
        );
        $data = $request->all();
        $this->userRepository->update($data, $id);
        return redirect()->route('user.index')->with($notification);
    }
    public function destroy($id)
    {
        try {
            $this->userRepository->delete($id);
            return response()->json('ok', 200);
        } catch (Exception $e) {
            Log::error(' loi' . $e->getMessage() . ' ở file ' . $e->getFile() . ' dòng ' . $e->getLine());
            return response()->json('errors', 500);
        }
    }
}
