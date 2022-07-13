<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" id="sidebar">
    <a href="{{route('dashboard')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="{{asset('images/logo.svg')}}" alt="Logo" class="px-5 pt-1">
        {{--<span class="fs-4">&nbspPhake</span>--}}
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
                <i class="fa-solid fa-house"></i>
                Trang Chủ
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa-solid fa-chart-line"></i>
                Thống kê
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa-solid fa-table-list"></i>
                Danh Mục
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa-solid fa-signs-post"></i>
                Bài Viết
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa-solid fa-comments"></i>
                Bình Luận
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa-solid fa-users"></i>
                Người Dùng
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>