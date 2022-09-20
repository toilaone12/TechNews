@extends('index')
@section('content')

<section id="feature_news_section" class="feature_news_section">
    <div class="container">
        <div class="row">
            <div class="col-md-7" style="padding-top: 10px">
                <div class="feature_article_wrapper">
                    @foreach($max_news as $key => $news)
                    <div class="feature_article_img">
                        <img class="img-responsive top_static_article_img" src="{{$news->image_news}}"
                             alt="feature-top" style="height: 595px" >
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a href="category.html">Tin nóng</a></div>
                        <div class="feature_article_title">
                            <h1><a href="{{URL::to('/detail-news',$news->id_news)}}" target="_self">{{$news->name_news}} </a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self">by TechNews</a>, 
                        <a href="#"target="_self">{{date("F d,Y",strtotime($news->updated_at))}}</a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            {{$news->summary_news}}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-share-alt"></i><a href="#">{{$news->views_news}}</a>Views</span>
                            <span><i class="fa fa-comments-o"></i><a href="#">{{$news->comment_news}}</a>Comments</span>
                        </div>
                        
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->
                    @endforeach
                </div>
                <!-- feature_article_wrapper -->

            </div>
            <!-- col-md-7 -->
            @foreach($news_order as $key => $order)
            <div class="col-md-5" style="padding-top: 10px">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img">
                        <img style="width:458px; height:292.5px;" class="img-responsive" src="{{$order->image_news}}" alt="feature-top">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg purple"><a href="category.html">Tin mới nhất</a></div>
                        <div class="feature_article_title">
                            <h1><a href="{{URL::to('/detail-news',$order->id_news)}}" target="_self">{{$order->name_news}} </a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self">by TechNews</a>, 
                        <a href="#" target="_self">{{date("F d,Y",strtotime($order->updated_at))}}</a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content hidden-text">
                            {{$order->summary_news}}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-share-alt"></i><a href="#">{{$order->views_news}}</a>Views</span>
                            <span><i class="fa fa-comments-o"></i><a href="#">{{$order->comment_news}}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_static_wrapper -->

            </div>
            <!-- col-md-5 -->
            @endforeach
            <!-- col-md-5 -->

        </div>
        <!-- Row -->

    </div>
    <!-- container -->

</section>
<!-- Feature News Section -->

<section id="category_section" class="category_section">
<div class="container">
<div class="row">
<div class="col-md-8">
@foreach($list_cate as $key => $cate)
    <div class="category_section mobile">
        <div class="article_title header_purple">
            <h2>
                <a href="{{URL::to('/category-news/'.$cate->id_cate.'/1')}}" target="_self">{{$cate->name_cate}}</a>
            </h2>
            
        </div>
        <!----article_title------>
        
        <div class="category_article_wrapper">
            <div class="row">
                @foreach($first_page as $key => $first_news)
                @if($first_news->id_cate == $cate->id_cate)
                <div class="col-md-6">
                <div class="top_article_img">
                    <a href="{{URL::to('/detail-news/'.$first_news->id_news)}}" target="_self"><img class="img-responsive" style="width:360px; height:216px;" src="{{$first_news->image_news}}" alt="feature-top">
                    </a>
                </div>
                    <!----top_article_img------>
                </div>
                
                <div class="col-md-6">
                    <span class="tag purple">{{$first_news->name_type}}</span>

                    <div class="category_article_title">
                        <h2><a href="{{URL::to('/detail-news/'.$first_news->id_news)}}" target="_self">{{$first_news->name_news}}</a></a></h2>
                    </div>
                    <!----category_article_title------>
                    <div class="category_article_date"><a href="#">{{date('d-F-Y',strtotime($first_news->updated_at))}}</a>, bởi: <a href="#">TechNews</a></div>
                    <!----category_article_date------>
                    <div class="category_article_content">
                        {{$first_news->summary_news}}
                    </div>
                    <!----category_article_content------>
                    <div class="media_social">
                        <span><a href="#"><i class="fa fa-share-alt"></i>{{$first_news->views_news}}</a> Views</span>
                        <span><i class="fa fa-comments-o"></i><a href="#">{{$first_news->comment_news}}</a> Comments</span>
                    </div>
                    <!----media_social------>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="category_article_wrapper">
            <div class="row">
                @foreach($second_pages as $key => $second_news)
                @if($second_news->id_cate == $cate->id_cate)
                <div class="col-md-6">
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img style="width: 122px; height: 122px;" class="media-object" src="{{$second_news->image_news}}"
                                            alt="Generic placeholder image"></a>
                        </div>
                        <div class="media-body">
                            <span class="tag purple">{{$second_news->name_type}}</span>

                            <h3 class="media-heading"><a href="{{URL::to('/detail-news',$second_news->id_news)}}" target="_self">{{$second_news->name_news}}</a></h3>
                            <span class="media-date"><a href="#">{{date('d-F-Y',strtotime($second_news->updated_at))}}</a>,
                            bởi: <a href="#">TechNews</a></span>

                            <div class="media_social">
                                <span><a href="#"><i class="fa fa-share-alt"></i>{{$second_news->views_news}}</a> Views</span>
                                <span><a href="#"><i class="fa fa-comments-o"></i>{{$second_news->comment_news}}</a> Comments</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
    </div>
@endforeach
<!-- Mobile News Section -->
<!-- Design News Section -->
</div>
<!-- Left Section -->

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
                    <a href="{{URL::to('/detail-news',$popular->id_news)}}" target="_self">{{$popular->name_news}}</a>
                </h3> 
                <span class="media-date">
                    <a href="#">{{date("F m,Y",strtotime($popular->updated_at))}}</a>  bởi: 
                    <a href="#">TechNews</a>
                </span>

                <div class="widget_article_social">
                    <span>
                        <a href="#" target="_self"> <i class="fa fa-share-alt"></i>{{$popular->views_news}}</a> View
                    </span> 
                    <span>
                        <a href="#" target="_self"><i class="fa fa-comments-o"></i>{{$popular->comment_news}}</a> Comments
                    </span>
                </div>
            </div>
        </div>
        @endforeach
        <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
    </div>
<!-- Popular News -->
<!-- Advertisement -->

<div class="widget hidden-xs m30">
    @foreach($select_ads as $key => $ads)
    <a href="{{$ads->link_slide}}">
        <img class="media-object widget_img" src="{{$ads->image_slide}}" alt="add_one">
    </a>
    @endforeach
</div>
<!-- Advertisement -->

<div class="widget reviews m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Reviews</a></h2>
    </div>
    <div class="media">
        <div class="media-left">
            <a href="#"><img class="media-object" src="{{('public/frontend/img/pop_right1.jpg')}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="#" target="_self">DSLR is the most old camera at this time readmore about new
                    products</a>
            </h3> 
            <span class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-full"></i>
            </span>
        </div>
    </div>
    <div class="media">
        <div class="media-left">
            <a href="#"><img class="media-object" src="{{('public/frontend/img/pop_right2.jpg')}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body"><h3 class="media-heading"><a href="#" target="_self">Samsung is the best
            mobile in the android market.</a></h3> <span class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-full"></i>
            </span></div>
    </div>
    <div class="media">
        <div class="media-left">
            <a href="#"><img class="media-object" src="{{('public/frontend/img/pop_right3.jpg')}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="#" target="_self">Apple launches photo-centric wrist watch for Android</a>
            </h3> 
            <span class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-full"></i>
            </span></div>
    </div>
    <div class="media">
        <div class="media-left">
            <a href="#"><img class="media-object" src="{{('public/frontend/img/pop_right4.jpg')}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="#" target="_self">Yasaki camera launches new generic hi-speed shutter camera.</a>
            </h3> 
            <span class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-full"></i>
            </span></div>
    </div>
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
</div>
<!-- Reviews News -->


<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{('public/frontend/img/right_add6.jpg')}}" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Tin bình luận</a></h2>
    </div>
    @foreach($most_comment as $key => $comment)
    <div class="media">
        <div class="media-left">
            <a href="#"><img class="media-object" style="width: 100px; height:100px;" src="{{$comment->image_news}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="{{URL::to('/detail-news',$comment->id_news)}}" target="_self">{{$comment->name_news}}</a>
            </h3>

            <div class="media_social">
                <span><i class="fa fa-comments-o"></i><a href="#">{{$comment->comment_news}}</a> Comments</span>
            </div>
        </div>
    </div>
    @endforeach
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&nbsp;&raquo; </a></p>
</div>
<!-- Most Commented News -->

<!--  Readers Corner News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{('public/frontend/img/podcast.jpg')}}" alt="add_one">
</div>
<!--Advertisement-->
</div>
<!-- Right Section -->

</div>
<!-- Row -->

</div>
<!-- Container -->

</section>

@endsection