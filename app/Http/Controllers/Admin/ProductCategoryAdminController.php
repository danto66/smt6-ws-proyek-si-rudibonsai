<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ProductCategory;

use Illuminate\Http\Request;

class ProductCategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::paginate(10);

        return view('admin.category', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductCategory::create($request->all());

        return redirect()->back()->with(['status' => 'success', 'message' => 'Kategori berhasil ditambahkan.']);
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
        ProductCategory::find($request->id)->update($request->all());

        return redirect()->back()->with(['status' => 'success', 'message' => 'Kategori berhasil diedit.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategory::destroy($id);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Kategori berhasil dihapus.']);
    }
}
