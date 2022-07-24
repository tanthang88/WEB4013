@extends('layouts.admin.master')
@section('title', $title)
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4 text-capitalize">cập nhật danh mục</h1>
        {{Breadcrumbs::render('editCategory', $category)}}
        <form action="" id="updateCategoryForm" method="POST">
            @csrf
            <div class="mb-3 col-lg-4">
                <label for="nameCategory" class="form-label text-capitalize">tên danh mục</label>
                <input type="text" name="name" id="nameCategory" class="form-control mb-2" value="{{$category->name}}" required>
            </div>
            <button type="submit" class="btn btn-outline-primary text-capitalize mt-3">cập nhật</button>
        </form>

    </div>
@endsection
@push('script')
    @vite('resources/js/admin/validate')
@endpush
