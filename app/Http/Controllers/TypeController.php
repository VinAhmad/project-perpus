<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = "Type";

        //Query Builder
        $type = Type::all();

        return view('type.home', [
            "title" => $judul,
            "data" => $type,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create', [
            "title" => "Tambah Type",
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
            'name' => ['required', 'max:20', 'min:3'],
            'code' => ['required', 'string', 'max:3'],
        ]);

        $type = new Type();

        $type->name = $request->name;
        $type->code = $request->code;

        $type->save();

        return redirect('/type');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $type = Type::find($id);
        $type = Type::where('id', '=', $id)->first();

        return view('type.show', [
            "title" => "Type",
            "data" => $type,
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
        // $type = Type::find($id);
        $type = Type::where('id', '=', $id)->first();

        return view('type.edit', [
            "title" => "Edit Type",
            "data" => $type,
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
            'name' => ['required', 'max:20', 'min:3'],
            'code' => ['required', 'string', 'max:3'],
        ]);

        $type = Type::find($request->id);
        $type->name = $request->name;
        $type->code = $request->code;

        $type->save();

        return redirect('/type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();

        return redirect('/type');
    }
}
