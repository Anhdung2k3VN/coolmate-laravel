<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class OderController extends Controller
{
    //
    public function oder_list()
    {
        $order = order::all();
        return view(
            'admin.oder.list',
            ['orders' => $order]
        );
    }
    public function oder_detail(Request $request)
    {

        $oder_detail = json_decode($request->oder_detail, true);
        $product_id = array_keys($oder_detail);
        $products = product::whereIn('id', $product_id)->get();
        return view(
            'admin.oder.detail',
            ['products' => $products],
            ['oder_detail' => $oder_detail]
        );
    }
}
