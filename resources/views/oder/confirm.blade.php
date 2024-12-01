@extends('main')
@section('content')
<section class="oder p-to-top">
    <div class="container">
        <div class="row-flex row-flex-product-detail">
            <p>
                Xác nhận đơn hàng:
                <span style="font-weight: bold">Đoàn Anh Dũng #21</span>
            </p>
        </div>
        <div class="row-flex">
            <div class="oder-confirm">
                <p>
                    Đơn hàng của bạn đã được gửi
                    <span style="font-weight: bold">Thành công</span> <br />
                    Vui lòng check
                    <span style="font-weight: bold; font-style: italic">Email</span>
                    để xác nhận đơn hàng
                </p>
                <button class="main-btn">Tiếp tục mua hàng</button>
            </div>
        </div>
    </div>
</section>
@endsection