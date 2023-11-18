@extends('home')
@section('content')
<main>
    <!-- About US Start -->
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="d-flex align-items-center justify-content-between mt-5 mb-3">
                        <div class="d-flex align-items-baseline">
                            <a href="{{route('category.allCategory',['slug' => $parentNews->slug_category])}}"><span class="fs-14 mr-2 text-primary">{{$parentNews->name_category}}</span></a>
                            <i class="fa-solid fa-angle-right text-secondary fs-12"></i>
                            <a href="{{route('category.allCategory',['slug' => $childNews->slug_category])}}"><span class="fs-14 ml-2 text-secondary">{{$childNews->name_category}}</span></a>
                        </div>
                        <span class="fs-14 text-secondary">{{$dateCreated}}</span>
                    </div>
                    <!-- Trending Tittle -->
                    <div class="about-right mb-30">
                        <div class="section-tittle mb-30">
                            <h1>{{$new->title_news}}</h1>
                        </div>
                        <div class="section-tittle">
                            <p class="fs-16 font-weight-bold">{{$new->summary_news}}</p>
                        </div>
                        {!! $new->content_news !!}
                    </div>
                    <div class="tags-news mb-30 d-flex align-items-center">
                        <span class="fs-13 mr-3">Từ khóa:</span>
                        <ul class="d-flex">
                            @foreach($arrTags as $tag)
                            <li><a href="{{route('tags.find',['slug' => $tag['slug']])}}" class="rounded btn-secondary px-2 py-1 fs-13 mr-2">{{$tag['name']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- From -->
                    <div class="row">
                        <div class="col-lg-8">
                            <form class="form-contact contact_form mb-80" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100 error" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control error" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control error" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control error" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-20 mt-45">
                        <span class="fs-18 pb-1 mr-3 text-dark font-weight-bold cursor-pointer" style="border-bottom: 1px solid #9f224e;">
                            Tin liên quan
                        </span>
                    </div>
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        @foreach($relates as $one)
                        <div class="card border-0 mb-20">
                            <div class="pb-2">
                                <a href="{{route('news.detail',['slug' => $one->slug_news])}}"><img src="{{asset($one->image_news)}}" alt="" height="138" loading="lazy" class="w-100 object-fit-cover"></a>
                            </div>
                            <div class="content">
                                <a href="{{route('news.detail',['slug' => $one->slug_news])}}">
                                    <div class="fs-15 font-weight-bold text-dark">{{$one->title_news}}</div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-20 mt-45">
                        <span class="fs-18 pb-1 mr-3 text-dark font-weight-bold cursor-pointer" style="border-bottom: 1px solid #9f224e;">
                            Xem nhiều
                        </span>
                    </div>
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        @foreach($mostViewsNews as $one)
                        <div class="card border-0 mb-20">
                            <div class="pb-2">
                                <a href="{{route('news.detail',['slug' => $one->slug_news])}}"><img src="{{asset($one->image_news)}}" alt="" height="138" loading="lazy" class="w-100 object-fit-cover"></a>
                            </div>
                            <div class="content">
                                <a href="{{route('news.detail',['slug' => $one->slug_news])}}">
                                    <div class="fs-15 font-weight-bold text-dark">{{$one->title_news}}</div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About US End -->
</main>
@endsection