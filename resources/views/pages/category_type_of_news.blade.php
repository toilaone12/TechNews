@extends('index')
@section('content')
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/')}}">News</a></li>
                <li><a href="{{URL::to('/')}}">Tech</a></li>
                @foreach($list_type_by_id as $key => $type_by_id)
                <li class="active"><a href="{{URL::to('/category-type-news/'.$type_by_id->id_type.'/'.'1')}}">{{$type_by_id->name_type}}</a></li>
                @endforeach
            </ol>
        </div>
    </div>
</section>

<div class="container">
<div class="row">
<div class="col-md-8">
<div class="entity_wrapper">
    @foreach($list_type_by_id as $key => $type_by_id)
    <div class="entity_title header_purple">
        <h1><a href="{{URL::to('/category-type-news/'.$type_by_id->id_type.'/'.'1')}}" target="_blank">{{$type_by_id->name_type}}</a></h1>
    </div>
    @endforeach
    <!-- entity_title -->
    @foreach($news_cate_by_id as $key => $news_new_by_cate)
    <div class="entity_thumb">
        <img class="img-responsive" src="{{$news_new_by_cate->image_news}}" alt="feature-top">
    </div>
    <!-- entity_thumb -->

    <div class="entity_title">
        <a href="{{URL::to('/detail-news',$news_new_by_cate->id_news)}}" target="_blank"><h3> {{$news_new_by_cate->name_news}} </h3></a>
    </div>
    <!-- entity_title -->

    <div class="entity_meta">
        <a href="#">{{date('d F Y',strtotime($news_new_by_cate->updated_at))}}</a>, bởi: <a href="#">TechNews</a>
    </div>
    <!-- entity_meta -->

    <div class="entity_content">
        {{$news_new_by_cate->summary_news}}
    </div>
    <!-- entity_content -->

    <div class="entity_social">
        <span><i class="fa fa-share-alt"></i>{{$news_new_by_cate->views_news}} <a href="#">Views</a> </span>
        <span><i class="fa fa-comments-o"></i>{{$news_new_by_cate->comment_news}} <a href="#">Comments</a> </span>
    </div>
    <!-- entity_social -->
    @endforeach

</div>
<!-- entity_wrapper -->

<div class="row">
    @foreach($select_news as $key => $news)
    <div class="col-md-6" style="margin-top: 20px;">
        <div class="category_article_body">
            <div class="top_article_img">
                <img class="img-fluid" width="350" height="186" src="{{$news->image_news}}" alt="feature-top">
            </div>
            <!-- top_article_img -->

            <div class="category_article_title">
                <h5><a href="{{URL::to('/detail-news/'.$news->id_news)}}" target="_blank">{{$news->name_news}} </a></h5>
            </div>
            <!-- category_article_title -->

            <div class="article_date">
            <a href="#">{{date('d F Y',strtotime($news->updated_at))}}</a>, bởi: <a href="#">TechNews</a>
            </div>
            <!-- article_date -->

            <div class="category_article_content">
                {{$news->summary_news}} 
            </div>
            <!-- category_article_content -->

            <div class="article_social">
                <span><a href="#"><i class="fa fa-share-alt"></i>{{$news->views_news}}  </a> Views</span>
                <span><i class="fa fa-comments-o"></i><a href="#">{{$news->comment_news}} </a> Comments</span>
            </div>
            <!-- article_social -->

        </div>
        <!-- category_article_body -->

    </div>
    @endforeach
</div>

<div class="widget_advertisement">
    <img class="img-responsive" src="{{asset('public/frontend/img/category_advertisement.jpg')}}" alt="feature-top">
</div>

<nav aria-label="Page navigation" class="pagination_section">
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
                        {{URL::to('/category-type-news/'.$list_type_by_id[0]->id_type.'/'.$previous)}}
                    @else
                        {{URL::to('/category-type-news/'.$list_type_by_id[0]->id_type.'/'.$pages)}}
                    @endif" 
                aria-label="Previous"> <span aria-hidden="true">&laquo;</span> 
            </a>
        </li>
        @for($i = 1; $i <= $number; $i++)
        <li><a href="{{URL::to('/category-type-news/'.$list_type_by_id[0]->id_type.'/'.$i)}}">{{$i}}</a></li>
        @endfor
        <li>
            <?php
                $next = $pages + 1;
            ?>
            <a  class="@if($pages < $number)
                        click-pages
                    @else
                        no-click-pages
                    @endif" 
                href="@if($pages < $number)
                        {{URL::to('/category-type-news/'.$list_type_by_id[0]->id_type.'/'.$next)}}
                    @else
                        {{URL::to('/category-type-news/'.$list_type_by_id[0]->id_type.'/'.$pages)}}
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
        <h2><a href="#">Popular News</a></h2>
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
    <p class="widget_divider"><a href="#" target="_blank">More News&nbsp;&raquo;</a></p>
</div>
<!-- Popular News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive adv_img" src="assets/img/right_add1.jpg" alt="add_one">
    <img class="img-responsive adv_img" src="assets/img/right_add2.jpg" alt="add_one">
    <img class="img-responsive adv_img" src="assets/img/right_add3.jpg" alt="add_one">
    <img class="img-responsive adv_img" src="assets/img/right_add4.jpg" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{$list_slide[0]->image_slide}}" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget reviews m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Views</a></h2>
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
    <p class="widget_divider"><a href="#" target="_blank">More News&nbsp;&raquo;</a></p>
</div>
<!-- Reviews News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{asset('public/frontend/img/right_add6.jpg')}}" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Commented</a></h2>
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
    <p class="widget_divider"><a href="#" target="_blank">More News&nbsp;&nbsp;&raquo; </a></p>
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
@endsection