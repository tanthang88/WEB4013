@extends('layouts.admin.master')
@section('title', Str::title($title))
@section('content')
    <div class="container-fluid mt-lg-3">
        {{Breadcrumbs::render('editPost', $dataPost)}}
        @if($errors->any())
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        @foreach($dataPost as $post)
            <form action="{{route('UpdatePost', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="" class="form-label fw-bolder">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="" class="form-label fw-bolder">Mô tả ngắn</label>
                        <input type="text" class="form-control" name="short_content" value="{{$post->short_content}}">
                    </div>
                    <div class="col-12 col-lg-4">
                        <label for="" class="form-label fw-bolder">Chuyên mục</label>
                        <select name="subcategories" id="" class="form-select">
                            @foreach($dataSubCategories as $subCategories)
                                @if($post->subCategories->id === $subCategories->id)
                                    <option selected value="{{$subCategories->id}}">{{$subCategories->name}}</option>
                                @else
                                    <option value="{{$subCategories->id}}">{{$subCategories->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div>
                            <label for="" class="form-label fw-bolder">Trạng thái</label>
                        </div>
                        @if($post->is_active === 0)
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="active"
                                       value="1">
                                <label for="" class="form-check-label">Hiển thị</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input"  name="active"
                                       value="{{$post->is_active}}" checked>
                                <label for="" class="form-check-label">Không hiển thị</label>
                            </div>
                        @elseif($post->is_active === 1)
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="active"
                                       value="{{$post->is_active}}" checked>
                                <label for="" class="form-check-label">Hiển thị</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="active"
                                       value="0">
                                <label for="" class="form-check-label">Không hiển thị</label>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 col-lg-4">
                        <label for="" class="form-label fw-bolder">Người đăng</label>
                        <p>{{$post->user->name}}</p>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="" class="fw-bolder">Nội dung</label>
                        <textarea id="editor" name="content">{{$post->content}}</textarea>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="" class="fw-bolder">Ảnh đại diện</label>
                        <input type="file" name="image" class="form-control">
                        <div class="my-2">
                            <img src="{{$post->image}}" alt="{{$post->title}}" width="200" height="200">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </div>
                </div>
            </form>
        @endforeach
        @if(session('success'))
            <div class="row mt-2">
                <div class="col-12 col-lg-4">
                    <div class="alert alert-success fw-bolder">
                        {{session('success')}}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@push('script')
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>--}}
@vite('resources/js/admin/ckeditor.js')
@endpush
