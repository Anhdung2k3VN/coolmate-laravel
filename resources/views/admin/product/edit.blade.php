@extends('admin.main')
@section('content')

<!-- Nội dung -->

<form action="" enctype="multipart/form-data" method="post">
    <div class="admin-content-main-content-product-add">
        <div class="admin-content-main-content-product-left">
            <div class="admin-content-main-content-two-input">
                <input type="text" value="{{$product->name}}" name="name" placeholder="Tên sản phẩm">
                <input type="text" value="{{$product->material}}" name="material" placeholder="Chất liệu">
                <select name="category_id" id="">
                    <option value="0" {{$product->category_id == 0 ? 'selected' : ''}}>Danh mục</option>
                    <option value="1" {{$product->category_id == 1 ? 'selected' : ''}}>Áo thun</option>
                    <option value="2" {{$product->category_id == 2 ? 'selected' : ''}}>Áo sơ mi</option>
                    <option value="3" {{$product->category_id == 3 ? 'selected' : ''}}>Áo khoác</option>
                    <option value="4" {{$product->category_id == 4 ? 'selected' : ''}}>Áo len</option>
                    <option value="5" {{$product->category_id == 5 ? 'selected' : ''}}>Áo polo</option>
                </select>
            </div>
            <div class="admin-content-main-content-two-input">
                <input name="price_normal" value="{{$product->price_normal}}" type="text" placeholder="Giá bán">
                <input name="price_sale" value="{{$product->price_sale}}" type="text" placeholder="Giá giảm">
            </div>
            <textarea name="description" id="editor" placeholder="Đặc điểm nổi bật">{{$product->description}}</textarea>
            <textarea name="content" id="editor1" placeholder="Mô tả sản phẩm">{{$product->content}}</textarea>

            <div class="admin-content-main-content-button">
                <button type="submit" class="main-btn">Cập nhật sản phẩm</button>
            </div>
        </div>


        <div class="admin-content-main-content-product-right">
            <div class="admin-content-main-content-input-image">
                <label for="file"><i class="ri-file-image-line"></i> Ảnh đại diện</label>
                <input id="file" type="file">
                <input type="hidden" name="image" id="input-file-img-hidden" value="{{$product->image}}">
                <div class="image-show" id="input-file-img"><img src="{{asset($product->image)}}" alt=""></div>
            </div>
            <div class="admin-content-main-content-input-images">
                <label for="files"><i class="ri-folder-image-line"></i> Ảnh mô tả </label>
                <input id="files" multiple type="file">
                <div class="input-file-imgs" id="input-file-imgs">
                    @php

                    $product_images = explode("*", $product->image_list);

                    @endphp
                    @foreach($product_images as $item)
                    <img src="{{asset($item)}}" alt="">
                    <input type="hidden" name="images[]" id="input-file-img-hidden" value="{{$item}}">
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    @csrf
</form>

@endsection

<script type="module" src=""></script>
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css">
<script type="importmap">
    {
			"imports": {
				"ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
				"ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
			}
		}
</script>