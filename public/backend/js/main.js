$(document).ready(function(){
    //xu ly anh tin tuc
    $('p').each(function() {
        // Kiểm tra xem thẻ <p> có thẻ <img> không
        if ($(this).find('img')) {
            // Kiểm tra xem thẻ <p> có lớp 'text-center' không
            $('p:has(img)').addClass('text-center');
        }
    });
    $("p img").each(function () {
        // Duyệt qua tất cả các thẻ <img> trong các thẻ <p>
        $(this).removeAttr("height"); // Gỡ bỏ thuộc tính height
        $(this).removeAttr("width");  // Gỡ bỏ thuộc tính width
        $(this).addClass("custom-image"); // Thêm lớp CSS tùy chỉnh
    });
    $('.js-example-basic-multiple').select2();
    $('#fileInput').on('change',function(){
        if (this.files && this.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $(".image-original").attr("src", e.target.result);
            };
    
            reader.readAsDataURL(this.files[0]);
        }
    })
    $('.check-hot').on('change',function(){
        var isChecked = $(this).prop('checked');
        if(isChecked){
            $('.text-switch').text('Tắt');
            $(this).val(0);
        }else{
            $('.text-switch').text('Bật');
            $(this).val(1);
        }
    })
    
})