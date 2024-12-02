@extends('main')
@section('content')

<form action="/cart/send" method="post">
    <section class="cart p-to-top">
        <div class="container">
            <div class="row-flex row-flex-product-detail">
                <p>Giỏ hàng</p>
                <!-- @php
            var_dump(Session::get('cart'));
            @endphp -->
            </div>
            <div class="row-grid">
                <div class="cart-left">
                    <h2 class="main-h2">Chi tiết đơn hàng</h2>
                    <div class="cart-left-detail">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Sản phẩm</th>
                                    <th>Thành tiền</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($products as $product)
                                @php
                                $price = $product->price_sale * Session::get('cart')[$product->id];
                                $total += $price;
                                @endphp
                                <tr>
                                    <td>
                                        <img style="width: 70px" src="{{$product->image}}" alt="" />
                                    </td>
                                    <td>
                                        <div class="product-detail-right-info">
                                            <h1>{{$product->name}}</h1>

                                            <div class="product-price">
                                                <p>{{ number_format( $product->price_sale)}}
                                                    <del>{{number_format($product->price_normal)}}</del>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="product-detail-right-quantity-input">
                                            <i class="ri-subtract-fill"></i>
                                            <input onkeydown="return false" class="quantity-input" type="number"
                                                value="{{Session::get('cart')[$product->id]}}"
                                                name="product_id[{{$product->id}}]" />
                                            <i class="ri-add-line"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{ number_format( $price)}}</p>
                                    </td>
                                    <td>
                                        <a href="/cart/delete/{{$product->id}}"><i class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tbody class="cart-left-detail-money">
                                <td colspan="2">Tổng tiền</td>
                                <td colspan="2">{{number_format($total)}}
                                </td>
                            </tbody>
                        </table>
                        <br />
                        <button formaction="/cart/update" class="main-btn">Cập nhật giỏ hàng</button>
                        <a href="/category">Tiếp tục mua hàng >></a>
                    </div>
                </div>
                <div class="cart-right">
                    <h2 class="main-h2">Thông tin giao hàng</h2>
                    <div class="cart-right-input-name-phone">
                        <input type="text" placeholder="Tên" name="name" />
                        <input type="text" placeholder="Số điện thoại" name="phone" />
                    </div>
                    <div class="cart-right-input-email">
                        <input type="text" placeholder="Email" name="email">
                    </div>
                    <div class="cart-right-input-address address-container">
                        <input type="text" id="address" name="address" required placeholder="Nhập địa chỉ của bạn"
                            autocomplete="off">
                        <div id="suggestions" class="suggestions"></div>
                    </div>
                    <div class="cart-right-input-select">


                        <input type="text" id="city" name="city" required placeholder="Tỉnh/thành phố" disabled>



                        <input type="text" id="district" name="district" required placeholder="Quận/huyện" disabled>



                        <input type="text" id="ward" name="ward" required placeholder="Phường/xã" disabled>

                    </div>


                    <div class="cart-right-input-note">
                        <input type="text" placeholder="Ghi chú" name="note">
                    </div>
                    <br>
                    <button class="main-btn">Gủi Đơn Hàng</button>
                </div>
            </div>
    </section>
    @csrf
</form>

@endsection
<script type="module" src="{{asset('frontend/asset/js/apiprovince.js')}}"></script>

<!-- <script>
    const output = `Tỉnh: ${data.tinh}, Quận: ${data.quan}, Phường: ${data.phuong}`;
</script> -->