@extends('layouts.admin.master')
@section('title', Str::title($title))
@section('content')
    <div class="container-fluid mt-lg-3">
        {{Breadcrumbs::render('addPost')}}
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
            <form action="{{route('AddPost')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <label for="" class="form-label fw-bolder">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" value="">
                    </div>
                    <div class="col-12 col-lg-4">
                        <label for="" class="form-label fw-bolder">Chuyên mục</label>
                        <select name="subcategories" id="" class="form-select">
                            @foreach($dataSubCategories as $subCategories)
                                <option value="{{$subCategories->id}}">{{$subCategories->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div>
                            <label for="" class="form-label fw-bolder">Trạng thái</label>
                        </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="active"
                                       value="1" checked>
                                <label for="" class="form-check-label">Hiển thị</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="active"
                                       value="0">
                                <label for="" class="form-check-label">Không hiển thị</label>
                            </div>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="" class="fw-bolder">Nội dung</label>
                        <textarea id="editor" name="content"></textarea>
                    </div>
                    <div class="col-12 col-lg-4 mt-2">
                        <label for="" class="fw-bolder">Ảnh đại diện</label>
                        <input type="file" name="image" class="form-control">
                        <button type="submit" class="btn btn-primary mt-2">Thêm</button>
                    </div>
                </div>
            </form>
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
    @vite('resources/js/admin/ckeditor.js')
@endpush
