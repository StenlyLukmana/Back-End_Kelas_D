<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    
    //View form create
    public function form() {
        $title = 'Create Book';
        $categories = Category::all();
        return view('form', compact('title', 'categories'));
    }

    //Buat create
    public function createBook(BookRequest $request) {

        $extension = $request->file('image')->getClientOriginalExtension();

        $fileName = $request->title.'_'.$request->author.'.'.$extension;

        $request->file('image')->storeAs('public/images/', $fileName);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
            'release' => $request->release,
            'image' => $fileName,
            'category_id' => $request->category_id
        ]);

        return redirect(route('view'));

    }

    //Buat view data buku
    public function viewBooks(){
        $title = 'View Book';
        $books = Book::all();
        $categories = Category::all();
        return view('view', compact('title', 'books', 'categories'));
    }

    public function getBookByID($id){
        $title = 'Update Book';
        $book = Book::find($id);
        $categories = Category::all();
        return view('update', compact('title', 'book', 'categories'));
    }

    public function updateBook($id, BookRequest $request){
        $book = Book::find($id);

        $extension = $request->file('image')->getClientOriginalExtension();

        $fileName = $request->title.'_'.$request->author.'.'.$extension;

        $request->file('image')->storeAs('public/images/', $fileName);

        $book->update([
            'title' => $request->title,
            'author'=> $request->author,
            'price' => $request->price,
            'release' => $request->release,
            'image' => $fileName,
            'category_id' => $request->category_id
        ]);
        return redirect('/view');
    }

    public function deleteBook($id){
        Book::destroy($id);
        return redirect(route('view'));
    }

}
