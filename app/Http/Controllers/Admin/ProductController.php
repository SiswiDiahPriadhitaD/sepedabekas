<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Products';
        $data = Product::with('brand')
                        ->with('type')
                        ->get();
        return view('admin.products.index', compact([
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
        $title = 'Products';
        $brands = Brand::all();
        $types = Type::all();
        return view('admin.products.create', compact([
            'title', 'types', 'brands'
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
        // ddd($request->all());
        $request->validate([
            'brand_id' => 'required',
            'type_id' => 'required',
            'name' => 'required|string',
            'description' => 'required|string',
            'star' => 'required',
            'price' => 'required',
            'photo' => 'required',
        ]);
        // $photo = null;
        if($request->file('photo')){
            $photo = $request->file('photo')->store('product', 'public');
        }

        Product::create([
            'brand_id' => $request->brand_id,
            'type_id' => $request->type_id,
            'name' => $request->name,
            'description' => $request->description,
            'star' => $request->star,
            'price' => $request->price,
            'photo' => $photo
        ]);

        return redirect()->to('/admin/product')
                    ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Products';
        $data = Product::with('brand')
                    ->with('type')
                    ->where('id', $id)->first();
        return view('admin.products.show', compact([
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
        $title = 'Products';
        $brands = Brand::all();
        $types = Type::all();
        $data = Product::with('brand')
                    ->with('type')
                    ->where('id', $id)->first();
        return view('admin.products.edit', compact([
            'title', 'data', 'brands', 'types'
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
        $row = Product::where('id', $id)->first();
        $request->validate([
            'brand_id' => 'required',
            'type_id' => 'required',
            'name' => 'required|string',
            'description' => 'required|string',
            'star' => 'required',
            'price' => 'required',
        ]);
        
        $photo = null;

        if($request->file('photo')){
            $photo = $request->file('photo')->store('product', 'public');
        }

        Product::where('id', $id)->update([
            'brand_id' => $request->brand_id,
            'type_id' => $request->type_id,
            'name' => $request->name,
            'description' => $request->description,
            'star' => $request->star,
            'price' => $request->price,
            'photo' => ($photo == null) ? $row->photo : $photo
        ]);

        return redirect()->to('/admin/product')
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
        Product::where('id', $id)->delete();
        return redirect()->to('/admin/product')
                    ->with('success', 'Data berhasil dihapus');
    }
}
