$(document).ready(function(){
    $('p').each(function() {
        // Kiểm tra xem thẻ <p> có thẻ <img> không
        if ($(this).find('img')) {
            // Kiểm tra xem thẻ <p> có lớp 'text-center' không
            $('p:has(img)').addClass('text-center');
        }
        if ($(this).find('a')) {
            // Kiểm tra xem thẻ <p> có lớp 'text-center' không
            $('p > a').addClass('text-primary');
        }
    });
    $("p img").each(function () {
        // Duyệt qua tất cả các thẻ <img> trong các thẻ <p>
        $(this).removeAttr("height"); // Gỡ bỏ thuộc tính height
        $(this).removeAttr("width");  // Gỡ bỏ thuộc tính width
        $(this).addClass("custom-image"); // Thêm lớp CSS tùy chỉnh
    });
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            console.log(position);
            // Lấy thông tin vị trí hiện tại
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            console.log(latitude);
            console.log(longitude);
            // Xử lý vị trí của bạn ở đây
            $.ajax({
                url: 'https://api.openweathermap.org/data/2.5/weather',
                method: 'GET',
                data: {
                    lat: latitude,
                    lon: longitude,
                    appid: '69f59d0621e668fb571e5dda73e6ab46'
                },
                success: function(data){
                    console.log(data);
                },
                error: function(err){
                    console.log(err);
                }
            })
        });
    } else {
    console.log("Trình duyệt không hỗ trợ Geolocation.");
    }
})
