<?php

namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Detail;
use App\Repositories\Book\BookRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BooksController extends Controller
{
    private $BookRepository;
    public function __construct(BookRepository $BookRepository)
    {
        $this->BookRepository = $BookRepository;
    }
    public function index()

    {
        // abort(404);
        $book = $this->BookRepository->all();
        return view('books.index', compact('book'));
    }
    public function create()
    {
        $author = Author::all();
        $category = Category::all();
        return view('books.create', compact('author', 'category'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     'day_of_birth' => 'required',
        //     'address' => 'required',
        //     'phone' => 'required'
        // ]);
        try {
        $book = new Book();
        $book->name = $request->name;
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->information = $request->information;
        $book->publication_date = $request->publication_date;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension();//jpg,png lấy ra định dạng file và trả về
            $fileName = time();//45678908766 tạo tên file theo thời gian
            $newFileName = $fileName.'.'.$fileExtension;//45678908766.jpg
            $path = 'storage/'. $request->file('image')->store('images', 'public');//lưu file vào mục public/images với tê mới là $newFileName
            $book->image = $path;
        }
        $book->save();
        $detail = new Detail();
        $detail->book_id = $book->id;
        $detail->price = $request->price;
        $detail->rental_price = $request->rental_price;
        $detail->amount = $request->amount;
        $detail->save();
           return redirect()->route('book.index');
        } catch (Exception $e) {
            Log::error('errors' . $e->getMessage() . 'getLine' . $e->getLine());
            abort(403);
        }
    }

    public function show($id)
    {
        return view('books.show');
    }

    public function edit($id)
    {
        return view('books.edit');
    }


    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        try {
            $this->BookRepository->delete($id);
            return response()->json('ok', 200);
        } catch (Exception $e) {
            Log::error('errors' . $e->getMessage() . 'getLine' . $e->getLine());
            abort(403);
        }
    }
}
