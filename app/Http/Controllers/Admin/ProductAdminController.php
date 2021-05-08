<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();

        return view('admin.products.create', compact('categories'));
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
            'images' => 'required',
            'images.*' => 'image',
        ]);

        if ($request->hasFile('images')) {
            $product = Product::create($request->all());
            $files = $request->file('images');

            foreach ($files as $file) {
                $newName = $this->storeImage($file);

                $data = [
                    'name' => $newName,
                    'product_id' => $product->id,
                ];

                ProductImage::create($data);
            }

            return redirect()->route('admin.products.index')->with(['status' => 'success', 'message' => 'Produk berhasil ditambahkan.']);
        }

        return redirect()->back()->with(['status' => 'danger', 'message' => 'File foto produk kosong.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = ProductCategory::all();

        return view('admin.products.create', compact('product', 'categories'));
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
        Product::find($id)->update($request->all());

        return redirect()->route('admin.products.index')->with(['status' => 'success', 'message' => 'Produk berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileName = [];
        $path = 'public/img/products/';
        $files = Product::find($id)->productImages;

        foreach ($files as $file) {
            $fileName[] = $path . $file->name;
        }

        // dd($fileName);

        Storage::disk('local')->delete($fileName);

        Product::destroy($id);

        return redirect()->back()->with('message', 'Produk berhasil dihapus.');
    }

    public function editImages($id)
    {
        $images = Product::find($id)->productImages;

        return view('admin.products.edit-images', compact('images'));
    }

    public function destroyImage($id)
    {
        $image = ProductImage::find($id)->name;
        $path = 'public/img/products/';
        $filename = $path . $image;

        Storage::disk('local')->delete($filename);

        ProductImage::destroy($id);

        return redirect()->back()->with('message', 'Foto produk berhasil dihapus.');
    }

    public function addImage(Request $request, $productId)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $this->storeImage($file);

            ProductImage::create([
                'name' => $image,
                'product_id' => $productId,
            ]);

            return redirect()->back()->with(['status' => 'success', 'message' => 'Foto produk berhasil ditambahkan.']);
        }

        return redirect()->back()->with(['status' => 'danger', 'message' => 'Terjadi kesalahan, file foto produk kosong.']);
    }

    public function setPrimaryImage($productId, $productImageId)
    {
        $productImages = Product::find($productId)->productImages;

        foreach ($productImages as $productImage) {
            $primary = 0;

            if ($productImage->id == $productImageId) {
                $primary = 1;
            }

            ProductImage::find($productImage->id)->update([
                'is_primary' => $primary,
            ]);
        }

        return redirect()->back()->with(['status' => 'success', 'message' => 'Foto utama berhasil diperbarui.']);
    }

    public function storeImage($file)
    {
        $name = rand(1000, 9999);
        $time = time();
        $extension = $file->getClientOriginalExtension();
        $newName = $time . $name  . '.' . $extension;

        Storage::putFileAs('public/img/products', $file, $newName);

        return $newName;
    }
}
