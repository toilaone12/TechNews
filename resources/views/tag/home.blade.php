@extends('home')
@section('content')
<main>
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row d-flex justify-content-between py-2 border-bottom">
                <div class="col-lg-12 d-flex align-items-center">
                    <span class="fs-27 cursor-pointer font-weight-bold text-dark">Từ khóa: {{$tag->title_tag}}</span>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-9 pr-3" style="border-right: 1px solid #dee2e6!important">
                    @php
                    $count = 0;
                    @endphp
                    @foreach($news as $new)
                    @php
                    $count++;
                    @endphp
                    <div class="trending-bottom first-news border-bottom">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-35 d-flex">
                                    <div class="trend-bottom-img object-fit-cover">
                                        <a href="{{route('news.detail',['slug' => $new->slug_news])}}">
                                            <img src="{{asset($new->image_news)}}" alt="" width="500" height="300" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="trend-bottom-cap p-3" style="background-color: #f7f7f7">
                                        <h4><a href="{{route('news.detail',['slug' => $new->slug_news])}}" class="fs-20 hover-title">{{$new->title_news}}</a></h4>
                                        <p style="line-height: normal !important;" class="text-secondary"><a href="{{route('news.detail',['slug' => $new->slug_news])}}" class="text-secondary fs-14">{{$new->summary_news}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                    if($count == 1) break;
                    @endphp
                    @endforeach
                    @foreach($news as $key => $new)
                    @if($key > 0)
                    <div class="second-news mt-35 pb-35 border-bottom">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <div class="trend-bottom-img object-fit-cover">
                                        <a href="{{route('news.detail',['slug' => $new->slug_news])}}">
                                            <img src="{{asset($new->image_news)}}" alt="" width="240" height="144" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="trend-bottom-cap p-3">
                                        <h4><a href="{{route('news.detail',['slug' => $new->slug_news])}}" class="fs-18 hover-title">{{$new->title_news}}</a></h4>
                                        <p style="line-height: normal !important;" class="text-secondary"><a href="{{route('news.detail',['slug' => $new->slug_news])}}" class="text-secondary fs-14">{{$new->summary_news}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col-lg-3">
                    <div class="border">
                        <div class="card-body">
                            @foreach($differentNews as $key => $new)
                            <div class="pb-15 {{$key > 0 ? 'pt-15' : ''}} border-bottom">
                                <div class="d-flex">
                                    <div class="trend-bottom-cap mr-2" style="width: 130px;">
                                        <span><a href="{{route('news.detail',['slug' => $new->slug_news])}}" class="fs-13 hover-title text-dark">{{$new->title_news}}</a></span>
                                    </div>
                                    <div class="trend-bottom-img object-fit-cover">
                                        <a href="{{route('news.detail',['slug' => $new->slug_news])}}">
                                            <img src="{{asset($new->image_news)}}" alt="" width="100" height="60" loading="lazy">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- Whats New End -->
 
 
    <!--Start pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    {!!$news->links('paginations.page')!!}
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
    </main>
@endsection