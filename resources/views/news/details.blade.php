@extends('home')
@section('content')
<main>
    <!-- About US Start -->
    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <!-- Trending Tittle -->
                    <div class="about-right mb-90">
                        <div class="section-tittle mb-30 pt-30">
                            <h3>{{$new->title_news}}</h3>
                        </div>
                        <div class="section-tittle">
                            <p class="fs-16 font-weight-bold">{{$new->summary_news}}</p>
                        </div>
                        {!! $new->content_news !!}
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
                    <div class="section-tittle mb-20 mt-30 ml-20">
                        <h3>Tin liên quan</h3>
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
                </div>
            </div>
        </div>
    </div>
    <!-- About US End -->
</main>
@endsection