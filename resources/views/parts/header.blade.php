<div class="container">
    <div class="row-flex">
        <div class="header-bar-icon"><i class="ri-menu-line"></i></div>
        <div class="header-logo">
            <a href="/">
                <img src="{{asset('frontend/asset/image/logo.png')}}" alt="" />
            </a>
        </div>
        <div class="header-nav">
            <ul>
                <li><a href="{{asset('/category')}}">SẢN PHẨM</a></li>
                <li><a href="{{asset('category/aothun')}}">ÁO THUN</a></li>
                <li><a href="{{asset('category/aosomi')}}">ÁO SƠ MI</a></li>
                <li><a href="{{asset('category/aokhoac')}}">ÁO KHOÁC</a></li>
                <li><a href="{{asset('category/aolen')}}">ÁO LEN</a></li>
                <li><a href="{{asset('category/aopolo')}}">ÁO POLO</a></li>
            </ul>
        </div>
        <div class="header-search">
            <form action="/category/search" method="get">
                <input type="text" placeholder="Tìm kiếm" name="keywork" />
                <button><i class="ri-search-2-line"></i></button>
                @csrf
            </form>
        </div>
        <div class="header-cart">
            <a href="cart.html">
                <i class="ri-shopping-cart-line" number="0"></i>
            </a>
        </div>
    </div>
</div>