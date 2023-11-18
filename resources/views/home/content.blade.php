@extends('home')
@section('content')

<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Tin nóng</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        @php
                        $count = 0;
                        @endphp
                        @foreach($hotNews as $key => $hot)
                        @php
                        $count++;
                        @endphp
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single-bottom mb-35">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="trend-bottom-img mb-30">
                                                    <img src="{{asset($hot->image_news)}}" alt="" width="520" height="312" loading="lazy">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="trend-bottom-cap">
                                                    <h4><a href="details.html" class="fs-20">{{$hot->title_news}}</a></h4>
                                                    <p style="line-height: normal !important;" class="text-secondary"><a href="details.html" class="text-secondary fs-13">{{$hot->summary_news}}</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($count == 1)
                        @php
                        break;
                        @endphp
                        @endif
                        @endforeach
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-3">
                        @foreach($hotNews as $key => $hot)
                        @if($key >= 1)
                        <div class="trand-right-single">
                            <div class="trand-right-img">
                                <img src="{{asset($hot->image_news)}}" alt="" width="250" height="150" loading="lazy">
                            </div>
                            <div class="mt-2">
                                <h4><a href="details.html" class="fs-15">{{$hot->title_news}}</a></h4>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Area Start -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach($arrNews as $key => $parent)
                        <div class="col-lg-6">
                            <div class="row d-flex justify-content-between">
                                <div class="col-lg-12 col-md-12 mt-4">
                                    <div class="section-tittle mb-30 d-flex align-items-center">
                                        <a href="{{route('category.allCategory',['slug' => $parent['parent']['slug']])}}" class="fs-17 pb-1 mr-3 text-danger font-weight-bold cursor-pointer" style="border-bottom: 1px solid #9f224e;">{{$parent['parent']['name']}}</a>
                                        @php
                                        $count1 = 0;
                                        @endphp
                                        @foreach($parent['arrChild'] as $key => $child)
                                        @php
                                        $count1++;
                                        @endphp
                                        <a href="{{route('category.allCategory',['slug' => $child['slug']])}}" class="fs-13 mr-3 cursor-pointer text-secondary">{{$child['name']}}</a>
                                        @php
                                        if($count1 == 3) break;
                                        @endphp
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        @php
                                        $count2 = 0;
                                        @endphp
                                        @foreach($parent['arrChild'] as $key => $child)
                                        @foreach($child['listNews'] as $key1 => $new)
                                        @php
                                        $count2++;
                                        @endphp
                                        <div class="col-lg-6 {{$count2 > 2 ? 'mt-3' : ''}}">
                                            <div class="card border-0">
                                                <div class="pb-2">
                                                    <a href="{{route('news.detail',['slug' => $new->slug_news])}}"><img src="{{asset($new->image_news)}}" alt="" width="195" height="113" loading="lazy"></a>
                                                </div>
                                                <div class="content">
                                                    <a href="{{route('news.detail',['slug' => $new->slug_news])}}">
                                                        <div class="fs-15 font-weight-bold text-dark">{{$new->title_news}}</div>
                                                        <div class="subtitle fs-14 text-secondary text-summary">
                                                            {{$new->summary_news}}
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @php
                                        if($count2 == 4){
                                        break;
                                        }
                                        @endphp
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 mt-4 border-left">
                    <p class="fs-17 text-danger font-weight-bold">Tin mới nhất</p>
                    <div class="row">
                        @foreach($newsCreated as $one)
                        <div class="col-lg-12">
                            <div class="card border-0">
                                <div class="pb-2">
                                    <a href="{{route('news.detail',['slug' => $one->slug_news])}}"><img src="{{asset($one->image_news)}}" alt="" width="270" height="168" loading="lazy"></a>
                                </div>
                                <div class="content">
                                    <a href="{{route('news.detail',['slug' => $one->slug_news])}}">
                                        <p class="fs-15 font-weight-bold text-dark">{{$one->title_news}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
</main>

@endsection