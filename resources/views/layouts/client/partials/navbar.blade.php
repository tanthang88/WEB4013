<nav class="navbar navbar-expand-lg navbar-light">
    <div class="d-flex justify-content-between align-items-center navbar-top">
        <ul class="navbar-left">
            <li>Wed, March 4, 2020</li>
            <li>30°C,London</li>
        </ul>
        <div>
            <a class="navbar-brand" href="/"
            ><img src="{{asset('logo.svg')}}" alt=""
                /></a>
        </div>
        <div class="d-flex">
            <ul class="navbar-right">
                {{--<li>
                    <a href="#">ENGLISH</a>
                </li>
                <li>
                    <a href="#">ESPAÑOL</a>
                </li>--}}
            </ul>
            <ul class="social-media">
                <li>
                    <a href="#">
                        <i class="mdi mdi-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="" class="text-decoration-none">
                        <i class="mdi mdi-account"></i>
{{--                        <i class="mdi mdi-logout"></i>--}}
                        Đăng nhập
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-bottom-menu">
        <button
            class="navbar-toggler"
            type="button"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div
            class="navbar-collapse justify-content-center collapse"
            id="navbarSupportedContent"
        >
            <ul
                class="navbar-nav d-lg-flex justify-content-between align-items-center"
            >
                <li>
                    <button class="navbar-close">
                        <i class="mdi mdi-close"></i>
                    </button>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="/">Trang chủ</a>
                </li>
                @foreach($listCategories as $categories)
                    <li class="nav-item">
                        <a class="nav-link" href="">{{$categories->name}}</a>
                        @if($categories->subCategories)
                            <ul class="sub-nav">
                                @foreach($categories->subCategories as $subCategories)
                                    <li class="sub-nav-item">
                                        <a href="{{$categories->url.'/'.$subCategories->url}}"
                                           class="text-decoration-none text-dark">{{$subCategories->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="mdi mdi-magnify"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
