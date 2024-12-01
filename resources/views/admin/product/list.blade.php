@extends('admin.main')
@section('content')
<div class="admin-content-main-content-product-list">
    <table>
        <thead>
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Giá giảm</th>
                <th>Ngày đăng</th>
                <th>Tùy chỉnh</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->id }}</td>
                <td><img style="width: 70px;" src="{{ $product->image }}" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price_normal) }}đ</td>
                <td>{{ number_format($product->price_sale) }}đ</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <a style="padding: 10px;" class="edit-class
                    " href="/admin/product/edit/{{ $product->id }}">Sửa</a>
                    <a style="padding: 10px;" class="delete-class"
                        onclick="removeRow(product_id='{{$product->id}}' ,url='/admin/product/delete')" href="#">Xóa</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="pagination">
        {{ $products->links() }}
    </div>
    @endsection

    <script>
        function removeRow(product_id, url) {
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
                $.ajax({
                    url: url,
                    data: {
                        product_id
                    },
                    method: "GET",
                    dataType: "JSON",
                    success: function(res) {
                        console.log(res);
                        if (res.success == true) {
                            alert('Xóa sản phẩm thành công');
                            location.reload();
                        } else {
                            alert('Xóa sản phẩm thất bại');
                        }
                    },
                });
            }
        }
    </script>
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