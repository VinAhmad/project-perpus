<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = "Archive";

        //Query Builder
        $archive = Archive::all();

        return view('archive.home', [
            "title" => $judul,
            "data" => $archive,
        ]);
    }
}
