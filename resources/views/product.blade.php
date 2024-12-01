@extends('main')
@section('content')
<section class="product-detail p-to-top">
    <form action="/cart/add" method="post">
        <div class="container">
            <div class="row-flex row-flex-product-detail">
                <p>Sản phẩm</p>
                <i class="ri-arrow-right-line"> </i>
                <p>{{$product->name}}</p>
            </div>
            <div class="row-grid">
                <div class="product-detail-left">
                    <img class="product-image-main" src="{{$product->image}}" alt="" />
                    <div class="product-image-items">
                        <img class="active" src="{{$product->image}}" alt="" />
                        @php
                        $product_images = explode('*', $product->image_list);
                        @endphp
                        @foreach ($product_images as $image)
                        <img src="{{$image}}" alt="" />
                        @endforeach
                    </div>
                </div>
                <div class="product-detail-right">
                    <div class="product-detail-right-info">
                        <h1>{{$product->name}}</h1>
                        <span>{{$product->material}}</span>
                        <div class="product-price">
                            <p>{{ number_format( $product->price_sale)}}
                                <del>{{number_format($product->price_normal)}}</del>
                            </p>
                        </div>
                    </div>
                    <div class="product-detail-right-des">
                        <h2>Đặc điểm nổi bật</h2>

                        {!!$product->description!!}

                    </div>
                    <div class="product-detail-right-quantity">
                        <h2>Số lượng:</h2>
                        <div class="product-detail-right-quantity-input">
                            <i class="ri-subtract-fill"></i>
                            <input onkeydown="return false" class="quantity-input" type="number" value="1"
                                name="product_qty" />
                            <input type="hidden" value="{{$product->id}}" name="product_id" />
                            <i class="ri-add-line"></i>
                        </div>
                    </div>
                    <div class="product-detail-right-addcart">
                        <button type="submit" class="main-btn">Thêm vào giỏ hàng</button>
                    </div>
                </div>
            </div>
            <div class="row-flex">
                <div class="product-detail-content">
                    <h2>Chi tiết sản phẩm</h2>

                    {!!$product->content!!}

                    <!-- <img src="asset/image/image-baner.jpg" alt="" /> -->
                </div>
            </div>
        </div>


        @csrf
    </form>
</section>

@endsection