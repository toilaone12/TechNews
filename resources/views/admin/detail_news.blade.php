<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>24 News — Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
    <link href="{{asset('public/backend/css/media_query.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/backend/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{asset('public/backend/css/animate.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="{{asset('public/backend/css/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/backend/css/owl.theme.default.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="{{asset('public/backend/css/style_1.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body class="single">
@foreach($list_news as $value_news)
<div id="fh5co-title-box" style=" background-position: 50% 90.5px; background-image: url({{$value_news->image_news}})" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="page-title">
        <img src="images/person_1.jpg" alt="Free HTML5 by FreeHTMl5.co">
        <span>{{date("D, d/m/Y, H:i",strtotime($value_news->updated_at))}}</span>
        <h2>{{$value_news->name_news}}</h2>
    </div>
</div>
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <p>
                    {!!html_entity_decode($value_news->content_news,ENT_HTML5)!!}
                </p>
                <!-- <p>
                    Nulla tincidunt sit amet ligula interdum pulvinar. Sed nec volutpat enim. Praesent pretium
                    ullamcorper
                    quam, at rhoncus magna consectetur quis. Nulla condimentum, libero vel varius sodales, lacus urna
                    accumsan purus, at
                    mattis nisi nibh in lorem. Sed laoreet, ante vitae tincidunt auctor, sapien metus tincidunt ante,
                    quis aliquam lacus risus id quam.
                </p>
                <h3>Free HTML5 Templates</h3>
                <p>
                    Nam vehicula viverra quam, nec ornare ex convallis eget. Praesent pulvinar, justo at lacinia
                    elementum, dolor elit facilisis massa, vel feugiat elit massa et libero. Praesent hendrerit metus eu
                    elementum commodo. Morbi tempus mi a nulla scelerisque, vitae vulputate nisi commodo. Maecenas felis
                    urna, dictum quis mollis quis, mollis vel ligula. Nullam sodales sapien tellus, ornare tincidunt
                    dolor imperdiet at. Vestibulum convallis, felis quis condimentum finibus, justo lectus aliquam
                    libero, eu lacinia tellus leo eu orci.
                </p>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, modi!</li>
                    <li>Ea iure at, debitis culpa perspiciatis suscipit laudantium a, expedita.</li>
                    <li>Voluptate distinctio perspiciatis cum sed ipsum nisi accusantium a aut!</li>
                    <li>Sed vel quo dignissimos, quaerat totam officia, deserunt provident minus.</li>
                </ul>
                <p>
                    Maecenas consequat dictum aliquam. Praesent nec magna at ipsum facilisis dictum sit amet nec arcu.
                    Donec ac metus a elit rhoncus euismod et sit amet velit. Nunc quis lacus vel metus tincidunt
                    vulputate in et libero. Aliquam dolor lacus, facilisis ultrices rutrum in, blandit vitae nulla.
                    Nullam vestibulum, odio vitae aliquam aliquam, nibh dui iaculis augue, ut tristique nisi est in
                    tellus. Fusce volutpat ultricies venenatis. In a arcu in tellus tincidunt accumsan. Nulla pretium at
                    ex viverra vulputate. Cras mollis velit metus, non suscipit felis luctus sit amet. Ut vel leo vitae
                    magna blandit tempor in sit amet arcu. Donec dignissim mattis dui. Donec ultrices malesuada sapien,
                    ut fermentum nisi efficitur eu. Phasellus dui eros, posuere vel lacus vitae, venenatis feugiat
                    libero. Nunc sed nisi feugiat, consequat arcu id, vehicula augue. Donec viverra tincidunt nisi eget
                    ornare.
                </p> -->
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('public/backend/js/owl.carousel.min.js')}}"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="{{asset('public/backend/js/jquery.waypoints.min.js')}}"></script>
<!-- Parallax -->
<script src="{{asset('public/backend/js/jquery.stellar.min.js')}}"></script>
<!-- Main -->
<script src="{{asset('public/backend/js/main.js')}}"></script>
<script>if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)){$(window).stellar();}</script>

</body>
</html>