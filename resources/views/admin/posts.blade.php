@extends('layouts.admin.master')
@section('title', Str::title($title))
@section('content')
    <h1 class="mt-4">Quản Lí Tin Tức</h1>
    {{Breadcrumbs::render('posts')}}

    <div class="container-fluid table-responsive">
        <button class="btn btn-primary mb-2">
            <a href="{{url('admin/posts/add')}}" class="text-white text-decoration-none text-capitalize">Thêm bài
                viết</a>
        </button>
        @if(session('success'))
            <div class="row mt-2">
                <div class="col-12">
                    <div class="alert alert-success fw-bolder text-center">
                        {{session('success')}}
                    </div>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="row mt-2">
                <div class="col-12">
                    <div class="alert alert-danger fw-bolder text-center">
                        {{session('error')}}
                    </div>
                </div>
            </div>
        @endif
        {{--        <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-dark">
                        <input type="checkbox" class="form-check-input" id="checkAllCategories">
                        Chọn tất cả
                    </button>
                    <button class="btn btn-dark my-2 deleteAll" data-bs-toggle="modal" data-bs-target="#modalCategoryDelete">Xoá
                    </button>
                </div>--}}
        <table class="table table-hover table-bordered">
            <thead class="align-middle">
            <tr class="text-capitalize">
                <th>tiêu đề</th>
                <th>ảnh</th>
                <th>trạng thái</th>
                <th>chuyên mục</th>
                <th>tác giả</th>
                <th>ngày tạo</th>
                <th>ngày cập nhật</th>
                <th>hành động</th>
            </tr>
            </thead>
            <tbody class="align-middle">
            @foreach($listPosts as $post)
                <tr class="align-middle">

                    <td>{{Str::limit(Str::ucfirst($post->title), 30)}}</td>
                    <td class="text-center">
                        <img src="{{$post->image}}" alt="Ảnh bài viết" width="80" height="80">
                    </td>
                    <td class="text-center">
                        @if($post->is_active === 0)
                            <span class="text-danger fw-bolder text-capitalize">không hiển thị</span>
                        @else
                            <span class="text-success fw-bolder text-capitalize">hiển thị</span>
                        @endif
                    </td>
                    <td>{{$post->subCategories->name}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at->format('H:i:s d/m/Y')}}</td>
                    <td>{{$post->updated_at->format('H:i:s d/m/Y')}}</td>
                    <td class="d-flex justify-content-center py-lg-5">
                        <div class="btn-group text-center" role="group">
                            <button type="button" class="btn btn-dark">
                                <a href="{{route('EditPost',$post->id)}}" class="text-white"
                                    {{--data-bs-toggle="modal"
                                    data-bs-target="#modalPostDelete"--}}
                                >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </button>
                            <button type="button" class="btn btn-warning">
                                <a href="{{route('DeletePost', $post->id)}}" class="text-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$listPosts->links()}}
    </div>
    <!-- Modal Delete-->
    {{--<div class="modal fade show" id="modalPostDelete" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Bạn có muốn xóa bài viết này không?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="alert-danger alert fw-bold text-danger">Nếu xóa chuyên mục này sẽ xóa tất cả các bài viết
                        thuộc chuyên mục. Vui lòng suy nghĩ kĩ trước khi xóa!</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="acceptDelete">
                        Đồng ý
                    </button>
                </div>
            </div>
        </div>
    </div>--}}
@endsection


