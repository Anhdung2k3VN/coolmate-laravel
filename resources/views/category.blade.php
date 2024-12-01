@extends('main')
@section('content')
<section class="cartegory">
    <div class="container">
        <div class="cartegory-container">
            <!-- <div class="cartegory-left">
                <ul>
                    <li class="cartegory-left-list"><a href="#">SẢN PHẨM</a></li>
                </ul>
            </div> -->
            <div class="cartegory-right row">
                <div class="cartegory-right-top">
                    <div class="cartegory-right-top-item">
                        <p>{{$title}}</p>

                    </div>
                    <div class="cartegory-right-top-item">
                        <button>
                            <span>Bộ lọc</span><i class="fa-solid fa-sort-down"></i>
                        </button>
                    </div>
                    <div class="cartegory-right-top-item">
                        <div class="cartegory-right-top-items">
                            <form action="">
                                @csrf
                                <select id="sortSelect" onchange="sortProducts(this.value)">
                                    <option value="">Sắp xếp</option>
                                    <option value="asc">Giá tăng dần</option>
                                    <option value="desc">Giá giảm dần</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="cartegory-right-content">
                    <div class="cartegory-right-content-item">
                        @foreach ($products as $product)

                        <div class="product-item row-grid">
                            <a href="/product/{{$product->id}}">
                                <div class="product-image">
                                    <img src="{{$product->image}}" alt="">
                                </div>
                            </a>
                            <div class="product-info">
                                <a href="/product/{{$product->id}}">
                                    <h3>{{$product->name}}</h3>
                                </a>
                                <span>{{$product->material}}</span>
                                <div class="product-price">
                                    <p>{{ number_format( $product->price_sale)}}
                                        <del>{{number_format($product->price_normal)}}</del>
                                    </p>
                                </div>
                                <!-- <div class="buttom-1">
                                    <button type="submit">
                                        <i class="fa-solid fa-cart-plus"></i>
                                        <span>add to cart</span>
                                    </button>
                                </div> -->
                            </div>

                        </div>
                        @endforeach

                    </div>


                    <div class="page-nav">
                        {{$products->links()}}
                    </div>

                </div>

            </div>
        </div>
</section>
<style>
    .pagination {
        padding-top: 10px;
        list-style: none;
        padding-left: 0;
        text-align: center;
    }

    .pagination li {
        display: inline-block;
    }

    .pagination li+li {
        margin-left: 1rem;
    }

    .pagination a {
        text-decoration: none;
        padding: 0.2rem 0.4rem;
        color: red;
        border: 1px solid red;
        border-radius: 2px;
    }
</style>

<script>
    function sortProducts(sortBy) {

        const url = new URL(window.location.href);
        url.searchParams.set('sort', sortBy);

        window.location.href = url.toString();
    }
</script>
@endsection