<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\product;
use App\Models\order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class FrontendController extends Controller
{
    //
    public function index()
    {
        $products = product::limit(5)->get();;
        return view(
            'home',
            ['products' => $products],
            ['title' => 'Home']
        );
    }
    public function category()
    {
        $products = product::paginate(10);
        return view(
            'category',
            ['products' => $products],
            ['title' => 'SẢN PHẨM']
        )->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function product(Request $request)
    {
        $product = product::find($request->id);
        return view(
            'product',
            ['product' => $product],
            ['title' => 'Product Detail']
        );
    }

    public function add_cart(Request $request)
    {
        $product_id = $request->product_id;
        $product_qty = $request->product_qty;
        if (is_null(Session::get('cart'))) {
            Session::put('cart', [
                $product_id => $product_qty,
            ]);
            return redirect('/cart');
        } else {
            $cart = Session::get('cart');
            if (array_key_exists($product_id, $cart)) {
                $cart[$product_id] += $product_qty;
            } else {
                $cart[$product_id] = $product_qty;
            }
            Session::put('cart', $cart);
            return redirect('/cart');
        }
    }

    public function cart()
    {
        $cart = Session::get('cart');
        $product_id = array_keys($cart);
        $products = product::whereIn('id', $product_id)->get();

        return view(
            'cart',
            ['products' => $products]
        );
    }
    public function delete_cart(Request $request)
    {

        $cart = Session::get('cart');
        $id = $request->id;
        unset($cart[$id]);
        Session::put('cart', $cart);
        return redirect('/cart');
    }
    public function update_cart(Request $request)
    {
        $cart = $request->product_id;
        Session::put('cart', $cart);
        return redirect('/cart');
    }


    public function cart_send(Request $request)
    {





        $token = Str::random(12);
        $oder = new order();
        $note = $request->note;



        $oder->name = $request->input('name');
        $oder->phone = $request->input('phone');
        $oder->email = $request->input('email');

        $oder->address = $request->input('address');
        $oder->note = $request->input('note');
        $oder_detail = json_encode($request->input('product_id'));
        $oder->oder_detail = $oder_detail;
        $oder->token = $token;
        $mailfor = $oder->email;
        $namefor = $oder->name;
        $Mail = Mail::to($mailfor)->send(new TestMail($namefor));
        $oder->save();
        Session::forget('cart');
        return redirect('/oder/confirm');
    }
    public function aothun()
    {
        $products = product::where('category_id', 1)->paginate(10);
        return view(
            'category',
            ['products' => $products],
            ['title' => 'ÁO THUN']
        );
    }
    public function aosomi()
    {
        $products = product::where('category_id', 2)->paginate(10);
        return view(
            'category',
            ['products' => $products],
            ['title' => 'ÁO SƠ MI']
        );
    }
    public function aokhoac()
    {
        $products = product::where('category_id', 3)->paginate(10);
        return view(
            'category',
            ['products' => $products],
            ['title' => 'ÁO KHOÁC']
        );
    }
    public function aolen()
    {
        $products = product::where('category_id', 4)->paginate(10);
        return view(
            'category',
            ['products' => $products],
            ['title' => 'ÁO LEN']
        );
    }
    public function aopolo()
    {
        $products = product::where('category_id', 5)->paginate(10);
        return view(
            'category',
            ['products' => $products],
            ['title' => 'ÁO POLO']
        );
    }
    public function search(Request $request)
    {
        $search = $request->keywork;
        $products = product::where('name', 'like', '%' . $search . '%')
            ->orWhere('material', 'like', '%' . $search . '%')
            ->orWhere('price_sale', 'like',   $search)
            ->paginate(10);
        return view(
            'category',
            ['products' => $products],
            ['title' => 'Search']
        );
    }
    public function sort(Request $request)
    {


        // $sort = $request->sort;

        // if ($sort == 'asc') {
        //     $products = product::orderBy('price_sale', 'asc')->paginate(10);
        // } else {
        //     $products = product::orderBy('price_sale', 'desc')->paginate(10);
        // }
        // return view(
        //     'category',
        //     ['products' => $products],
        //     ['title' => 'Sort']
        // );
    }
}
