<!DOCTYPE html>
<html lang="en">

<head>
    @include('parts/head')
</head>

<body>
    <!-- ---------------HEADER---------- -->
    <header>
        @include('parts/header')
    </header>

    <!-- ---------------SLIDER---------- -->
    <section class="slider">
        <div class="slider-container">
            <div class="slider-item">
                <img src="{{'frontend/asset/image/baner3.jpeg'}}" alt="" />
            </div>
            <div class="slider-item">
                <img src="{{'frontend/asset/image/baner2.jpeg'}}" alt="" />
            </div>
            <div class="slider-item">
                <img src="{{'frontend/asset/image/baner1.jpg'}}" alt="" />
            </div>
        </div>
        <div class="slider-control">
            <button class="prev"><i class="ri-arrow-left-s-line"></i></button>
            <button class="next"><i class="ri-arrow-right-s-line"></i></button>
        </div>
    </section>

    <!-- ---------------HOT PRODUCT---------- -->
    <section class="hot-product">
        <div class="container">
            <div class="row-grid">
                <p class="heading-text">SẢN PHẨM HOT</p>
                <div class="hot-product-container" id="hot-product-container"></div>
                <div class="hot-product-container">
                    @foreach ($products as $product)

                    <div class="hot-product-item row-grid">
                        <a href="/product/{{$product->id}}">
                            <div class="hot-product-image">
                                <img src="{{$product->image}}" alt="" />
                            </div>
                        </a>
                        <div class="hot-product-info">
                            <a href="/product/{{$product->id}}">
                                <h3>{{$product->name}}</h3>
                            </a>
                            <span>{{$product->material}}</span>
                            <div class="product-price">
                                <p>{{ number_format( $product->price_sale)}}
                                    <del>{{number_format($product->price_normal)}}</del>
                                </p>
                            </div>
                            <div class="buttom-1">
                                <button type="submit">
                                    <i class="fa-solid fa-cart-plus"></i>
                                    <span>add to cart</span>
                                </button>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ---------------FOOTER---------- -->
    @include('parts/footer')
</body>

</html>