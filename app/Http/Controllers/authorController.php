<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Repositories\Author\AuthorRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class authorController extends Controller
{
    private $AuthorRepository;
    public function __construct(AuthorRepository $AuthorRepository)
    {
        $this->AuthorRepository = $AuthorRepository;
    }
    public function index()
    {
        $author = $this->AuthorRepository->all();
        return view('authores.index', compact('author'));
    }

    public function create()
    {
        return view('authores.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->AuthorRepository->create($data);
        return redirect()->route('author.index');
    }

    public function show($id)
    {
        $this->AuthorRepository->find($id);
        return view('authores.show');
    }


    public function edit($id)
    {
        $author = $this->AuthorRepository->find($id);
        return view('authores.edit', compact('author'));
        //
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->AuthorRepository->update($data, $id);
        return redirect()->route('author.index');
    }

    public function destroy($id)
    {
        try {
            $this->AuthorRepository->delete($id);
            // return response()->json('ok', 200);
        } catch (Exception $e) {
            Log::error(' loi' . $e->getMessage() . ' ở file ' . $e->getFile() . ' dòng ' . $e->getLine());
            return response()->json('errors', 500);
        }
    }
}
