<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class ProductsController extends Controller
{
    //
    public function insert_product(Request $request)
    {
        $product = new product();
        $product->name = $request->name;
        $product->material = $request->material;
        $product->category_id = $request->category_id;
        $product->price_normal = $request->price_normal;
        $product->price_sale = $request->price_sale;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->image = $request->image;
        $product_images = implode('*', $request->images);
        $product->image_list = $product_images;
        $product->save();
        return redirect()->back();
    }
    public function add_product()
    {
        return view("admin.product.add", [
            'title' => 'Thêm sản phẩm'
        ]);;
    }
    public function list_product()
    {
        $product = product::paginate(5);
        return view("admin.product.list", [
            'title' => 'Danh sách sản phẩm',
            'products' => $product
        ])->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function delete_product(Request $request)
    {
        // dd($request->id);
        product::find($request->product_id)->delete();
        return response()->json([
            'success' => true
        ]);
    }
    public function edit_product(Request $request)
    {
        $product = product::find($request->id);
        return view("admin.product.edit", [
            'title' => 'Sửa sản phẩm',
            'product' => $product
        ]);
    }
    public function update_product(Request $request)
    {

        $product = product::find($request->id);
        $product->name = $request->name;
        $product->material = $request->material;
        $product->category_id = $request->category_id;
        $product->price_normal = $request->price_normal;
        $product->price_sale = $request->price_sale;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->image = $request->image;
        $product_images = implode('*', $request->images);
        $product->image_list = $product_images;
        $product->save();
        return redirect('admin\product\list');
    }
}
