<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategorysController extends Controller
{
    private $CategoryRepository;
    public function __construct(CategoryRepository $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }
    public function index()
    {
       $category = $this->CategoryRepository->all();
       return view('categorys.index', compact('category'));
    }

    public function create()
    {

        return view('categorys.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $this->CategoryRepository->create($data);
        $notification = array(
            'message' => 'Cập nhật thư mục ' . $request->name . ' thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);
    }
    public function show($id)
    {
        $category = $this->CategoryRepository->find($id);
        return view('categorys.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->CategoryRepository->find($id);
        return view('categorys.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->CategoryRepository->update($data, $id);
        $notification = array(
            'message' => 'Cập nhật thư mục ' . $request->name . ' thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);
    }

    public function destroy($id)
    {
        try {
            $this->CategoryRepository->delete($id);
            return response()->json('ok', 200);
        } catch (Exception $e) {
            Log::error(' loi' . $e->getMessage() . ' ở file ' . $e->getFile() . ' dòng ' . $e->getLine());
            return response()->json('errors', 500);
        }

    }
}
