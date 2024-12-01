$.ajaxSetup({
    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
});
// Add product
$("#file").on("change", () => {
    var formData = new FormData();
    var file = $("#file")[0].files[0];
    formData.append("file", file);
    $.ajax({
        url: "/upload",
        processData: false, //illega invocation
        dataType: "json",
        data: formData,
        method: "POST",
        contentType: false, // khong hien o preview
        success: function (result) {
            if (result.success == true) {
                var html = "";
                html += '<img src="' + result.path + '" alt="">';
                $("#input-file-img").html(html);
                $("#input-file-img-hidden").val(result.path);
            }
        },
    });
});

// add product images
$("#files").on("change", () => {
    var formData = new FormData();
    var files = $("#files")[0].files;
    for (let index = 0; index < files.length; index++) {
        formData.append("files[]", files[index]);
    }
    $.ajax({
        url: "/uploads",
        method: "POST",
        dataType: "JSON",
        data: formData,
        contentType: false,
        processData: false,
        success: function (result) {
            if ((result.success = true)) {
                var html = "";
                for (let index = 0; index < result.url.length; index++) {
                    html +=
                        '<img src="' +
                        result.url[index] +
                        '" alt=""><input type="hidden" value="' +
                        result.url[index] +
                        '" class="product-images" name="images[]">';

                    $("#input-file-imgs").html(html);
                }
            }
        },
    });
});

//delete product
// function removeRow(product_id, url) {
//     if (confirm("Are You Sure")) {
//         $.ajax({
//             url: url,
//             data: { product_id },
//             method: "GET",
//             dataType: "JSON",
//             success: function (res) {
//                 console.log(res);
//             },
//         });
//     }
// }
