<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Book;
use App\Models\Type;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = "Book";

        //Query Builder
        $book = Book::all();

        return view('book.home', [
            "title" => $judul,
            "data" => $book,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::all();

        return view('book.create', [
            'title' => "Tambah Book",
            "type" => $type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'year' => ['required'],
            'publisher' => ['required'],
            'archive_name' => ['required'],
            'archive_number' => ['required'],
        ]);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'publisher' => $request->publisher,
            'type_id' => $request->type_id,
        ]);
        $last_book_id = $book->id;

        Archive::create([
            'name' => $request->archive_name,
            'archive_number' => $request->archive_number,
            'book_id' => $last_book_id
        ]);

        return redirect('/book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::where('id', '=', $id)->first();
        return view('book.show', [
            "title" => "History Peminjaman",
            "data" => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $archive = Archive::where('book_id', '=', $id)->first();
        $book = Book::where('id', '=', $id)->first();
        $type = Type::all();

        return view('book.edit', [
            'book' => $book,
            'archive' => $archive,
            'type' => $type,
            'title' => "Edit Book",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'year' => ['required'],
            'publisher' => ['required'],
            'archive_name' => ['required'],
            'archive_number' => ['required'],
        ]);

        Book::where('id', '=', $request->book_id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'publisher' => $request->publisher,
            'type_id' => $request->type_id,
        ]);

        Archive::where('id', '=', $request->archive_id)->update([
            'name' => $request->archive_name,
            'archive_number' => $request->archive_number,
        ]);

        return redirect('/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Archive::where('book_id', '=', $id)->delete();
        Book::where('id', '=', $id)->delete();

        return redirect('/book');
    }

    public function lend($id)
    {
        $book = Book::where('id', '=', $id)->first();
        $visitor = Visitor::all();

        return view('book.lend', [
            'book' => $book,
            'visitor' => $visitor,
            'title' => "Form Peminjaman Book",
        ]);
    }

    public function lending(Request $request)
    {
        DB::table('book_visitor')->insert([
            'description' => $request->description,
            'book_id' => $request->book_id,
            'visitor_id' => $request->visitor_id,
            'created_at' => now($tz = null),
        ]);

        return redirect('/book/show/'. $request->book_id);
    }

}
