<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Type of Car';
        $data = Type::withCount('product')
            ->get();
        return view('admin.types.index', compact([
            'title', 'data'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Type of Car';
        return view('admin.types.create', compact([
            'title'
        ]));
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
            'type' => 'required|string',
            'year' => 'required'
        ]);

        Type::create([
            'type' => strtoupper($request->type),
            'year' => $request->year
        ]);

        return redirect()->to('/admin/type')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Type of Car';
        $data = Type::withCount('product')
            ->where('id', $id)->first();
        return view('admin.types.show', compact([
            'title', 'data'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Type of Car';
        $data = Type::withCount('product')
            ->where('id', $id)->first();
        return view('admin.types.edit', compact([
            'title', 'data'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string',
            'year' => 'required'
        ]);

        Type::where('id', $id)->update([
            'type' => strtoupper($request->type),
            'year' => $request->year
        ]);

        return redirect()->to('/admin/type')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Type::where('id', $id)->delete();
        return redirect()->to('/admin/type')
            ->with('success', 'Data berhasil dihapus');
    }
}
