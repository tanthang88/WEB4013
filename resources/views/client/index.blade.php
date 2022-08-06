@extends('layouts.client.master')
@section('title', Str::title($title))
@section('content')
    <div class="banner-top-thumb-wrap">
        <div class="d-lg-flex justify-content-between align-items-center">
            @foreach($dataPostNewsBanner as $dataPostNew)
                <div class="d-flex justify-content-between  mb-3 mb-lg-0">
                    <div>
                        <img
                            src="{{$dataPostNew->image}}"
                            alt="thumbnail"
                            class="banner-top-thumb"
                        />
                    </div>
                    <h5 class="m-0 font-weight-bold">
                        <a href="" class="text-reset">{{Str::limit($dataPostNew->title, 30)}}</a>
                    </h5>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="owl-carousel owl-theme" id="main-banner-carousel">
                @foreach($dataPostNewsBanner as $dataPostNew)
                    <div class="item">
                        <div class="carousel-content-wrapper mb-2">
                            <div class="carousel-content">
                                <h1 class="font-weight-bold">
                                    {{$dataPostNew->title}}
                                </h1>
                                <h5 class="font-weight-normal  m-0">
                                    {{$dataPostNew->short_content}}
                                </h5>
                                <p class="text-color m-0 pt-2 d-flex align-items-center">
                                    <span class="fs-10 mr-1">
                                        @inject('carbon', 'Carbon\Carbon')
                                        @php
                                            $carbon::setLocale('vi');
                                        echo $carbon::create($dataPostNew->created_at)->diffForHumans($carbon::now())
                                        @endphp
                                    </span>
                                    <i class="mdi mdi-bookmark-outline mr-3"></i>
                                    <span class="fs-10 mr-1">126</span>
                                    <i class="mdi mdi-comment-outline"></i>
                                </p>
                            </div>
                            <div class="carousel-image">
                                <img src="{{$dataPostNew->image}}" alt="thumbnail" height="370px"/>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4">
            @foreach($listCommentsBanner->chunk(2) as $rowComments)
                <div class="row">
                    @foreach($rowComments as $comment)
                        <div class="col-sm-6">
                            <div class="py-3 border-bottom">
                                <div class="d-flex align-items-center pb-2">
                                    <img
                                        src="{{$comment->user->avatar}}"
                                        class="img-xs img-rounded mr-2"
                                        alt="thumb"
                                    />
                                    <span class="fs-12 text-muted">{{$comment->user->name}}</span>
                                </div>
                                <p class="fs-14 m-0 font-weight-medium line-height-sm">
                                    {{$comment->content}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

        </div>
    </div>
    @foreach($dataPosts[0] as $key => $cateOne)
        <div class="world-news">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex position-relative  float-left">
                        <h3 class="section-title">{{$key}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    $cateOne = collect($cateOne)->slice(0,4)
                @endphp
                    @foreach($cateOne as $postCateOne)
                    <div class="col-lg-3 col-sm-6 grid-margin mb-5 mb-sm-2">
                        <div class="position-relative image-hover">
                            <img
                                src="{{$postCateOne->image}}"
                                class="img-fluid"
                                alt="thumbnail-post"
                            />
                            <span class="thumb-title">{{$postCateOne->subCategories->name}}</span>
                        </div>
                        <h5 class="font-weight-bold mt-3">
                            {{$postCateOne->title}}
                        </h5>
                        <p class="fs-15 font-weight-normal">
                            {{$postCateOne->short_content}}
                        </p>
                        <a href="#" class="font-weight-bold text-dark pt-2">Xem chi tiết</a>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    @foreach($dataPosts[1] as $key => $cateTwo)
        <div class="editors-news">
            <div class="row">
                <div class="col-lg-3">
                    <div class="d-flex position-relative float-left">
                        <h3 class="section-title">{{$key}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6  mb-5 mb-sm-2">
                    <div class="position-relative image-hover">
                        <img
                            src="{{$cateTwo[0]->image}}"
                            class="img-fluid"
                            alt="{{$cateTwo[0]->title}}"
                        />
                        <span class="thumb-title">{{$cateTwo[0]->subCategories->name}}</span>
                    </div>
                    <h1 class="font-weight-600 mt-3">
                        {{$cateTwo[0]->title}}
                    </h1>
                    <p class="fs-15 font-weight-normal">
                        {{$cateTwo[0]->short_content}}
                    </p>
                </div>
                <div class="col-lg-6  mb-5 mb-sm-2">
                    <div class="row">
                        @php
                            $rowOne = collect($cateTwo)->slice(1,2);
                        @endphp
                        @foreach($rowOne as $postRowOne)
                            <div class="col-sm-6  mb-5 mb-sm-2">
                            <div class="position-relative image-hover">
                                <img
                                    src="{{$postRowOne->image}}"
                                    class="img-fluid"
                                    alt="{{$postRowOne->title}}"
                                />
                                <span class="thumb-title">{{$postRowOne->subCategories->name}}</span>
                            </div>
                            <h5 class="font-weight-600 mt-3">
                                <a href="" class="text-decoration-none text-dark">
                                    {{Str::title($postRowOne->title)}}
                                </a>
                            </h5>
                            <p class="fs-15 font-weight-normal">
                                {{Str::limit($postRowOne->short_content, 50)}}
                            </p>
                        </div>
                        @endforeach
                    </div>

                    @php
                        $rowTwo = collect($cateTwo)->slice(3,2);
                    @endphp
                    <div class="row mt-3">
                        @foreach($rowTwo as $postRowTwo)
                            <div class="col-sm-6">
                                <div class="position-relative image-hover">
                                    <img
                                        src="{{$postRowTwo->image}}"
                                        class="img-fluid"
                                        alt="{{$postRowTwo->title}}"
                                    />
                                    <span class="thumb-title">{{$postRowTwo->subCategories->name}}</span>
                                </div>
                                <h5 class="font-weight-600 mt-3">
                                    <a href="" class="text-decoration-none text-dark">
                                        {{Str::title($postRowTwo->title)}}
                                    </a>
                                </h5>
                                <p class="fs-15 font-weight-normal">
                                   {{Str::limit($postRowTwo->short_content, 50)}}
                                </p>
                            </div>
                        @endforeach
                        {{--<div class="col-sm-6  mb-5 mb-sm-2">
                            <div class="position-relative image-hover">
                                <img
                                    src="assets/images/dashboard/star-magazine-7.jpg"
                                    class="img-fluid"
                                    alt="world-news"
                                />
                                <span class="thumb-title">POLITICS</span>
                            </div>
                            <h5 class="font-weight-600 mt-3">
                                Japan cancels cherry blossom festivals over virus fears
                            </h5>
                            <p class="fs-15 font-weight-normal">
                                Lorem Ipsum has been the industry's standard dummy text
                            </p>
                        </div>--}}
                       {{-- <div class="col-sm-6">
                            <div class="position-relative image-hover">
                                <img
                                    src="assets/images/dashboard/star-magazine-8.jpg"
                                    class="img-fluid"
                                    alt="world-news"
                                />
                                <span class="thumb-title">TRAVEL</span>
                            </div>
                            <h5 class="font-weight-600 mt-3">
                                Classic cars reborn as electric vehicles
                            </h5>
                            <p class="fs-15 font-weight-normal">
                                Lorem Ipsum has been the industry's standard dummy text
                            </p>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@php
    $collectPosts = collect($dataPosts)->slice(2,4);
@endphp
{{--    foreach ($collectPost as $val){
    foreach ($val as $test){
    foreach ($test as $a){
    echo $a->title.'<br>';
    }
    }
    }--}}
    <div class="popular-news">
        <div class="row">
            <div class="col-lg-3">
                <div class="d-flex position-relative float-left">
                    <h3 class="section-title">{{Str::title('tin tức tổng hợp')}}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                @foreach($collectPosts as $collectPost)
                    <div class="row">
                        @foreach($collectPost as $postList)
                            @php($postList = collect($postList)->slice(0,4))
                            @foreach($postList as $post)
                            <div class="col-sm-3  mb-5 mb-sm-2">
                                <div class="position-relative image-hover">
                                    <img
                                        src="{{$post->image}}"
                                        class="img-fluid"
                                        alt="world-news"
                                    />
                                    <span class="thumb-title">{{$post->subCategories->name}}</span>
                                </div>
                                <h5 class="font-weight-600 mt-3">
                                    {{Str::title($post->title)}}
                                </h5>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                @endforeach
                    {{--<div class="col-sm-4 mb-5 mb-sm-2">
                        <div class="position-relative image-hover">
                            <img
                                src="assets/images/dashboard/star-magazine-10.jpg"
                                class="img-fluid"
                                alt="world-news"
                            />
                            <span class="thumb-title">SPORTS</span>
                        </div>
                        <h5 class="font-weight-600 mt-3">
                            Disney parks expand (good) vegan food options
                        </h5>
                    </div>
                    <div class="col-sm-4 mb-5 mb-sm-2">
                        <div class="position-relative image-hover">
                            <img
                                src="assets/images/dashboard/star-magazine-11.jpg"
                                class="img-fluid"
                                alt="world-news"
                            />
                            <span class="thumb-title">INTERNET</span>
                        </div>
                        <h5 class="font-weight-600 mt-3">
                            A hot springs where clothing is optional after dark
                        </h5>
                    </div>--}}

 {{--               <div class="row mt-3">
                    <div class="col-sm-4 mb-5 mb-sm-2">
                        <div class="position-relative image-hover">
                            <img
                                src="assets/images/dashboard/star-magazine-12.jpg"
                                class="img-fluid"
                                alt="world-news"
                            />
                            <span class="thumb-title">NEWS</span>
                        </div>
                        <h5 class="font-weight-600 mt-3">
                            Japanese chef carves food into incredible pieces of art
                        </h5>
                    </div>
                    <div class="col-sm-4 mb-5 mb-sm-2">
                        <div class="position-relative image-hover">
                            <img
                                src="assets/images/dashboard/star-magazine-13.jpg"
                                class="img-fluid"
                                alt="world-news"
                            />
                            <span class="thumb-title">NEWS</span>
                        </div>
                        <h5 class="font-weight-600 mt-3">
                            The Misanthrope Society: A Taipei bar for people who
                        </h5>
                    </div>
                    <div class="col-sm-4 mb-5 mb-sm-2">
                        <div class="position-relative image-hover">
                            <img
                                src="assets/images/dashboard/star-magazine-14.jpg"
                                class="img-fluid"
                                alt="world-news"
                            />
                            <span class="thumb-title">TOURISM</span>
                        </div>
                        <h5 class="font-weight-600 mt-3">
                            From Pakistan to the Caribbean: Curry's journey
                        </h5>
                    </div>
                </div>--}}
            </div>
            <div class="col-lg-3">
                {{--<div class="position-relative mb-3">
                    <img
                        src="assets/images/dashboard/star-magazine-15.jpg"
                        class="img-fluid"
                        alt="world-news"
                    />
                    <div class="video-thumb text-muted">
                        <span><i class="mdi mdi-menu-right"></i></span>LIVE
                    </div>
                </div>--}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-flex position-relative float-left">
                            <h3 class="section-title">{{Str::title('tin mới nhất')}}</h3>
                        </div>
                    </div>
                    @foreach($dataPostNews as $postNew)
                        <div class="col-sm-12">
                            <div class="border-bottom pb-3">
                                <h5 class="font-weight-600 mt-0 mb-0">
                                    {{Str::title($postNew->title)}}
                                </h5>
                                <p class="text-color m-0 d-flex align-items-center">
                                    <span class="fs-10 mr-1">
                                        {{\Carbon\Carbon::create($postNew->created_at)->diffForHumans(\Carbon\Carbon::now())}}
{{--                                        $carbon::create($dataPostNew->created_at)->diffForHumans($carbon::now()--}}
                                    </span>
                                    <i class="mdi mdi-bookmark-outline mr-3"></i>
                                    <span class="fs-10 mr-1">100</span>
                                    <i class="mdi mdi-comment-outline"></i>
                                </p>
                            </div>
                        </div>
                    @endforeach
                    {{--<div class="col-sm-12">
                        <div class="border-bottom pt-4 pb-3">
                            <h5 class="font-weight-600 mt-0 mb-0">
                                South Korea’s Moon Jae-in sworn in vowing address
                            </h5>
                            <p class="text-color m-0 d-flex align-items-center">
                                <span class="fs-10 mr-1">2 hours ago</span>
                                <i class="mdi mdi-bookmark-outline mr-3"></i>
                                <span class="fs-10 mr-1">126</span>
                                <i class="mdi mdi-comment-outline"></i>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="border-bottom pt-4 pb-3">
                            <h5 class="font-weight-600 mt-0 mb-0">
                                South Korea’s Moon Jae-in sworn in vowing address
                            </h5>
                            <p class="text-color m-0 d-flex align-items-center">
                                <span class="fs-10 mr-1">2 hours ago</span>
                                <i class="mdi mdi-bookmark-outline mr-3"></i>
                                <span class="fs-10 mr-1">126</span>
                                <i class="mdi mdi-comment-outline"></i>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="pt-4">
                            <h5 class="font-weight-600 mt-0 mb-0">
                                South Korea’s Moon Jae-in sworn in vowing address
                            </h5>
                            <p class="text-color m-0 d-flex align-items-center">
                                <span class="fs-10 mr-1">2 hours ago</span>
                                <i class="mdi mdi-bookmark-outline mr-3"></i>
                                <span class="fs-10 mr-1">126</span>
                                <i class="mdi mdi-comment-outline"></i>
                            </p>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
