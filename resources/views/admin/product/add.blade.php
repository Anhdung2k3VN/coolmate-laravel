@extends('admin.main')
@section('content')

<!-- Nội dung -->
<form action="/admin/product/add" enctype="multipart/form-data" method="post">
    <div class="admin-content-main-content-product-add">
        <div class="admin-content-main-content-product-left">
            <div class="admin-content-main-content-two-input">
                <input type="text" name="name" placeholder="Tên sản phẩm">
                <input type="text" name="material" placeholder="Chất liệu">
                <select name="category_id" id="">
                    <option value="0">Danh mục</option>
                    <option value="1">Áo thun</option>
                    <option value="2">Áo sơ mi</option>
                    <option value="3">Áo khoác</option>
                    <option value="4">Áo len</option>
                    <option value="5">Áo polo</option>
                </select>
            </div>
            <div class="admin-content-main-content-two-input">
                <input name="price_normal" type="text" placeholder="Giá bán">
                <input name="price_sale" type="text" placeholder="Giá giảm">
            </div>
            <textarea name="description" id="editor" placeholder="Đặc điểm nổi bật"></textarea>
            <textarea name="content" id="editor1" placeholder="Mô tả sản phẩm"></textarea>

            <div class="admin-content-main-content-button">
                <button type="submit" class="main-btn">Thêm sản phẩm</button>
            </div>
        </div>


        <div class="admin-content-main-content-product-right">
            <div class="admin-content-main-content-input-image">
                <label for="file"><i class="ri-file-image-line"></i> Ảnh đại diện</label>
                <input id="file" type="file">
                <input type="hidden" name="image" id="input-file-img-hidden">
                <div class="image-show" id="input-file-img"></div>
            </div>
            <div class="admin-content-main-content-input-images">
                <label for="files"><i class="ri-folder-image-line"></i> Ảnh mô tả </label>
                <input id="files" multiple type="file">
                <div class="input-file-imgs" id="input-file-imgs"></div>
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