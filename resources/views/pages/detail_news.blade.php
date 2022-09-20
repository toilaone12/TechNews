@extends('index')
@section('content')
<section id="entity_section" class="entity_section">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="entity_wrapper">
    @foreach($select_news as $key => $news)
    <div class="entity_title">
        <h1><a href="#">{{$news->name_news}}</a></h1>
    </div>
    <!-- entity_title -->

    <div class="entity_meta"><a href="#" target="_self">{{date('d-F-Y',strtotime($news->updated_at))}}</a>, bởi: <a href="#" target="_self">TechNews</a>
    </div>
    <!-- entity_meta -->
    <!-- entity_rating -->

    <div class="entity_social">
        <a href="#" class="icons-sm sh-ic">
            <i class="fa fa-share-alt"></i>
            <b>{{$news->views_news}}</b> <span class="share_ic">Views</span>
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
    </div>
    <!-- entity_social -->
    <!-- entity_thumb -->

    <div class="entity_content">
        <p>
            {!!html_entity_decode($news->content_news,ENT_HTML5)!!} //loại bỏ các ký tự đặc biệt
        </p>
    </div>
    <!-- entity_content -->

    <div class="entity_footer">
        <div class="entity_tag">
            @foreach($list_cate as $key => $cate)
            <span class="blank"><a href="{{URL::to('/category-news/'.$cate->id_cate.'/1')}}">{{$cate->name_cate}}</a></span>
            @endforeach
        </div>
        <!-- entity_tag -->

        <div class="entity_social">
            <span><i class="fa fa-share-alt"></i>{{$news->views_news}} <a href="#">Views</a> </span>
            <span><i class="fa fa-comments-o"></i>{{$news->comment_news}} <a href="#">Comments</a> </span>
        </div>
        <!-- entity_social -->

    </div>
    <!-- entity_footer -->
    @endforeach
</div>
<!-- entity_wrapper -->

<div class="related_news">
    <div class="entity_inner__title header_purple">
        <h2><a href="#">Related News</a></h2>
    </div>
    <!-- entity_title -->

    <div class="row">
        @foreach($select_related as $key => $related)
        <div class="col-md-6">
            <div class="media">
                <div class="media-left">
                    <a href="#"><img class="media-object w-100 h-100" src="{{$related->image_news}}"
                                     alt="Generic placeholder image"></a>
                </div>
                <div class="media-body">
                    <span class="tag purple"><a href="category.html" target="_self">{{$related->name_type}}</a></span>

                    <h3 class="media-heading"><a href="single.html" target="_self">{{$related->name_news}}</a></h3>
                    <span class="media-date"><a href="#">{{date('d-F-Y',strtotime($related->updated_at))}}</a>,  by: <a href="#">TechNews</a></span>

                    <div class="media_social">
                        <span><a href="#"><i class="fa fa-share-alt"></i>{{$related->views_news}}</a> Views</span>
                        <span><a href="#"><i class="fa fa-comments-o"></i>{{$related->comment_news}}</a> Comments</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Related news -->

<div class="widget_advertisement">
    <img class="img-responsive" src="assets/img/category_advertisement.jpg" alt="feature-top">
</div>
<!--Advertisement-->

<div class="readers_comment">
    <div class="entity_inner__title header_purple">
        <h2>Comment</h2>
    </div>
    <!-- entity_title -->

    <!-- <div class="media">
        <div class="media-left">
            <a href="#">
                <img alt="64x64" class="media-object" data-src="assets/img/reader_img1.jpg"
                     src="assets/img/reader_img1.jpg" data-holder-rendered="true">
            </a>
        </div>
        <div class="media-body">
            <h2 class="media-heading"><a href="#">Sr. Ryan</a></h2>
            But who has any right to find fault with a man who chooses to enjoy a pleasure that has
            no annoying consequences, or one who avoids a pain that produces no resultant pleasure?

            <div class="entity_vote">
                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                <a href="#"><span class="reply_ic">Reply </span></a>
            </div>
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img alt="64x64" class="media-object" data-src="assets/img/reader_img2.jpg"
                             src="assets/img/reader_img2.jpg" data-holder-rendered="true">
                    </a>
                </div>
                <div class="media-body">
                    <h2 class="media-heading"><a href="#">Admin</a></h2>
                    But who has any right to find fault with a man who chooses to enjoy a pleasure
                    that has no annoying consequences, or one who avoids a pain that produces no
                    resultant pleasure?

                    <div class="entity_vote">
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                        <a href="#"><span class="reply_ic">Reply </span></a>
                    </div>
                </div>
            </div>
        </div>

    </div> -->
    <!-- media end -->
    @foreach($select_comment as $key => $comment)
    <div class="media">
        <div class="media-body">
            <h2 class="media-heading">
                <a href="#">{{$comment->name_user}}</a>
                <span class="time-comment">{{date('d-m-Y',strtotime($comment->created_at))}}</span>
            </h2>
            {{$comment->comment}}
            <div class="entity_vote">
                <p style="cursor:pointer;" onclick="reply()"><span class="reply_ic">Reply </span></p>
            </div>
        </div>
    </div>
    
    @endforeach
    <!-- media end -->
</div>
<!--Readers Comment-->

<div class="widget_advertisement">
    <img class="img-responsive" src="assets/img/category_advertisement.jpg" alt="feature-top">
</div>
<!--Advertisement-->

<div class="entity_comments">
    <div style="display: block;" id="comment">
        <div class="entity_inner__title header_black">
            <h2>Bình luận</h2>
        </div>
        <!--Entity Title -->
        
        <div class="entity_comment_from">
            <form action="{{URL::to('/add-comment',$select_news[0]->id_news)}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="inputName" name="name_comment" placeholder="Tên">
                </div>
                <div class="form-group comment">
                    <textarea class="form-control" id="inputComment" name="content_comment" placeholder="Bình luận"></textarea>
                </div>
                
                <button type="submit" class="btn btn-submit red">Đồng ý</button>
            </form>
        </div>
    </div>
    <div style="display: none;" id="reply">
        <div class="entity_inner__title header_black">
            <h2>Trả lời</h2>
        </div>
        <div class="entity_comment_from">
            <form action="{{URL::to('/replies/'.$select_news[0]->id_news)}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="inputName" name="name_reply" placeholder="Tên">
                </div>
                <div class="form-group comment">
                    <textarea class="form-control" id="replyComment" name="content_reply" placeholder="Trả lời"></textarea>
                </div>
        
                <button type="submit" id="addReply" class="btn btn-submit red">Trả lời</button>
            </form>
        </div>
    </div>
    <!--Entity Comments From -->

</div>
<!--Entity Comments -->

</div>
<!--Left Section-->

<div class="col-md-4">
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Popular News</a></h2>
    </div>
    @foreach($select_popular as $key => $popular)
    <div class="media">
        <div class="media-left">
            <a href="#"><img class="media-object w-100 h-100" src="{{$popular->image_news}}" alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="single.html" target="_self">{{$popular->name_news}}</a>
            </h3> <span class="media-date"><a href="#">{{date('d-F-Y',strtotime($popular->updated_at))}}</a>,  by: <a href="#">TechNews</a></span>

            <div class="widget_article_social">
                <span>
                    <a href="single.html" target="_self"> <i class="fa fa-share-alt"></i>{{$popular->views_news}}</a> Views
                </span> 
                <span>
                    <a href="single.html" target="_self"><i class="fa fa-comments-o"></i>{{$popular->comment_news}}</a> Comments
                </span>
            </div>
        </div>
    </div>
    @endforeach
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
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
    <img class="img-responsive widget_img" src="assets/img/right_add5.jpg" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget reviews m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Views</a></h2>
    </div>
    @foreach($select_views as $key => $views)
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
    <img class="img-responsive widget_img" src="assets/img/right_add6.jpg" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Commented</a></h2>
    </div>
    @foreach($select_most_comment as $key => $comment)
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
<!--Right Section-->

</div>
<!-- row -->

</div>
<!-- container -->

</section>
<script>
    function reply(){
        let comment = document.getElementById('comment');
        let reply = document.getElementById('reply');
        if(reply.style.display == 'none' && comment.style.display == 'block'){
            reply.style.display = 'block';
            comment.style.display = 'none';
        }else{
            reply.style.display = 'none';
            comment.style.display = 'block';
        }
    }
</script>
@endsection