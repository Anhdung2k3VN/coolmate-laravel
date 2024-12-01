@extends('admin.main')
@section('content')
<div class="admin-content-main-content-oder">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>

                <th>Tên</th>
                <th>Giá</th>

                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total = 0;
            @endphp
            @foreach ($products as $product)

            <tr>
                <td>{{$product->id}}</td>
                <td><img style="width: 70px;" src="{{$product->image}}" alt=""></td>
                <td>{{$product->name}}</td>
                <td>
                    {{ number_format( $product->price_sale)}}
                </td>
                <td>{{$oder_detail[$product->id]}}</td>
                @php
                $price = $product->price_sale * $oder_detail[$product->id];
                $total += $price;
                @endphp

                <td>{{number_format($price)}}</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="5">Tổng cộng</td>
                <td style="font-weight: bold;">{{number_format($total)}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection