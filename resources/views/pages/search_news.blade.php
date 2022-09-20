@extends('index')
@section('content')
<section id="entity_section" class="entity_section">
<div class="container">
<div class="row">
<div class="col-md-8">
@foreach($search_news as $key => $search)
<div class="entity_wrapper">
    <div class="entity_title">
        <h1><a href="{{URL::to('/detail-news',$search->id_news)}}" target="_self">{{$search->name_news}}</a>
        </h1>
    </div>
    <!-- entity_title -->

    <div class="entity_meta">
        <a href="#">{{date('d F Y',strtotime($search->updated_at))}}</a>, bởi: <a href="#">TechNews</a>
    </div>

    <div class="entity_social">
        <a href="#" class="icons-sm sh-ic"><i class="fa fa-share-alt"></i><b>{{$search->views_news}}</b>
            <span class="share_ic">Views</span>
        </a>
        <a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
        <!--Twitter-->
        <a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
        <!--Google +-->
        <a href="#" class="icons-sm inst-ic"><i class="fa fa-google-plus"> </i></a>
        <!--Linkedin-->
        <a href="#" class="icons-sm tmb-ic"><i class="fa fa-ge"> </i></a>
        <!--Pinterest-->
        <a href="#" class="icons-sm rss-ic"><i class="fa fa-rss"> </i></a>
        <span class="arrow">&raquo;</span>
    </div>
    <!-- entity_social -->

    <div class="entity_thumb">
        <img class="img-responsive" src="{{$search->image_news}}" alt="feature-top">
    </div>
    <!-- entity_thumb -->

    <div class="entity_content">
        <p>{{$search->summary_news}}</p>
    </div>
    <!-- entity_content -->

</div>
@endforeach
<!-- entity_wrapper -->
<!-- entity_wrapper -->
<div class="widget_advertisement">
    <img class="img-responsive" src="{{asset('public/frontend/img/category_advertisement.jpg')}}" alt="feature-top">
</div>
<nav aria-label="Page navigation">
    <ul class="pagination center-page">
        <li>
            <?php
                $previous = $pages - 1;
            ?>
            <a  class="@if($pages > 1)
                        click-pages
                    @else
                        no-click-pages
                    @endif"
                href="@if($pages > 1)
                        {{URL::to('/search-news/'.$name_search.'/'.$previous)}}
                    @else
                        {{URL::to('/search-news/'.$name_search.'/'.$pages)}}
                    @endif" 
                aria-label="Previous"> <span aria-hidden="true">&laquo;</span> 
            </a>
        </li>
        @for($i = 1; $i <= $count; $i++)
        <li><a href="{{URL::to('/search-news/'.$name_search.'/'.$i)}}">{{$i}}</a></li>
        @endfor
        <li>
        <?php
                $next = $pages + 1;
            ?>
            <a  class="@if($pages < $count)
                        click-pages
                    @else
                        no-click-pages
                    @endif" 
                href="@if($pages < $count)
                        {{URL::to('/search-news/'.$name_search.'/'.$next)}}
                    @else
                        {{URL::to('/search-news/'.$name_search.'/'.$pages)}}
                    @endif"  
                aria-label="Next" class="active"> <span aria-hidden="true">&raquo;</span> 
            </a>
        </li>
    </ul>
</nav>
<!-- navigation -->
</div>
<!-- col-md-8 -->

<div class="col-md-4">
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Tin phổ biến</a></h2>
    </div>
    @foreach($popular_news as $key => $popular)
        <div class="media">
            <div class="media-left">
                <a href="#"><img class="media-object" style="width: 100px; height: 100px;" src="{{$popular->image_news}}" alt="Generic placeholder image"></a>
            </div>
            <div class="media-body">
                <h3 class="media-heading">
                    <a href="single.html" target="_self">{{$popular->name_news}}</a>
                </h3> 
                <span class="media-date">
                    <a href="#">{{date("F m,Y",strtotime($popular->updated_at))}}</a>  bởi: 
                    <a href="#">TechNews</a>
                </span>

                <div class="widget_article_social">
                    <span>
                        <a href="single.html" target="_self"> <i class="fa fa-share-alt"></i>{{$popular->views_news}}</a> View
                    </span> 
                    <span>
                        <a href="single.html" target="_self"><i class="fa fa-comments-o"></i>{{$popular->comment_news}}</a> Comments
                    </span>
                </div>
            </div>
        </div>
    @endforeach
    <p class="widget_divider"><a href="#" target="_blank">Tìm hiểu thêm&nbsp;&raquo;</a></p>
</div>
<!-- Advertisement -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="assets/img/right_add5.jpg" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget reviews m30">
<div class="widget_title widget_black">
        <h2><a href="#">Lượt theo dõi</a></h2>
    </div>
    @foreach($most_views as $key => $views)
    <div class="media">
        <div class="media-left">
            <a href="#"><img class="media-object w-100 h-100" src="{{$views->image_news}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="single.html" target="_blank">{{$views->name_news}}</a>
            </h3> 
            <div class="media_social">
                <span><a href="#"><i class="fa fa-share-alt"></i>{{$views->views_news}}</a> Views</span>
            </div>
        </div>
    </div>
    @endforeach
    <p class="widget_divider"><a href="#" target="_blank">Tìm hiểu thêm&nbsp;&raquo;</a></p>
</div>
<!-- Reviews News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="assets/img/right_add6.jpg" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget m30">
<div class="widget_title widget_black">
        <h2><a href="#">Lượt bình luận</a></h2>
    </div>
    @foreach($most_comment as $key => $comment)
    <div class="media">
        <div class="media-left">
            <a href="#"><img class="media-object w-100 h-100" src="{{$comment->image_news}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="single.html" target="_blank">{{$comment->name_news}}</a>
            </h3>

            <div class="media_social">
                <span><i class="fa fa-comments-o"></i><a href="#">{{$comment->comment_news}}</a> Comments</span>
            </div>
        </div>
    </div>
    @endforeach
    <p class="widget_divider"><a href="#" target="_blank">Tìm hiểu thêm&nbsp;&nbsp;&raquo; </a></p>
</div>
<!-- Most Commented News -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Editor Corner</a></h2>
    </div>
    <div class="widget_body"><img class="img-responsive left" src="assets/img/editor.jpg"
                                  alt="Generic placeholder image">

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without</p>

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without
            revolutionary ROI.</p>
        <button class="btn pink">Read more</button>
    </div>
</div>
<!-- Editor News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive add_img" src="assets/img/right_add7.jpg" alt="add_one">
    <img class="img-responsive add_img" src="assets/img/right_add7.jpg" alt="add_one">
    <img class="img-responsive add_img" src="assets/img/right_add7.jpg" alt="add_one">
    <img class="img-responsive add_img" src="assets/img/right_add7.jpg" alt="add_one">
</div>
<!--Advertisement -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Readers Corner</a></h2>
    </div>
    <div class="widget_body"><img class="img-responsive left" src="assets/img/reader.jpg"
                                  alt="Generic placeholder image">

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without</p>

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without
            revolutionary ROI.</p>
        <button class="btn pink">Read more</button>
    </div>
</div>
<!--  Readers Corner News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="assets/img/podcast.jpg" alt="add_one">
</div>
<!--Advertisement-->
</div>
<!-- col-md-4 -->

</div>
<!-- row -->

</div>
<!-- container -->

</section>
@endsection