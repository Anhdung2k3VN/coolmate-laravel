@extends('admin.main')
@section('content')
<div class="admin-content-main-content-oder">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Ghi chú</th>
                <th>Chi tiết</th>
                <th>Ngày</th>
                <th>Tình trạng</th>
                <th>Tùy chỉnh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td> {{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->note}}</td>
                <td><a href="/admin/oder/detail/{{$order->oder_detail}}" class="edit-class">Xem</a></td>
                <td>{{$order->created_at}}</td>
                <td><a href="" class="non-confirm-oder">Chưa xác nhận</a></td>
                <td>
                    <a href="" class="delete-class">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection