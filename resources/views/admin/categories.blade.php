@extends('layouts.admin.master')
@section('title', $title)
@section('content')
    <h1 class="mt-4">Quản Lí Danh Mục</h1>
    {{Breadcrumbs::render('categories')}}
    <div class="container table-responsive">
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-dark">
                <input type="checkbox" class="form-check-input" id="checkAllCategories">
                Chọn tất cả
            </button>
            <button class="btn btn-dark my-2 deleteAll" data-bs-toggle="modal" data-bs-target="#modalCategoryDelete">Xoá
            </button>
        </div>
        <table class="table table-hover table-bordered">
            <thead class="align-middle">
            <tr class="text-capitalize">
                <th>#</th>
                <th>tên danh mục</th>
                <th>đường dẫn</th>
                <th>ngày tạo</th>
                <th>ngày cập nhật</th>
                <th>hành động</th>
            </tr>
            </thead>
            <tbody class="align-middle">
            @foreach($allCategories as $category)
                <tr data-id-category="{{$category->id}}" class="category">
                        <td>
                            <input type="checkbox" name="categoriesId" value="{{$category->id}}" class="form-check-input">
                        </td>
                        <td>
                            {{Str::ucfirst($category->name)}}
                            <input type="hidden" name="categoriesName" data-id-categories="{{$category->id}}" value="{{Str::ucfirst($category->name)}}">
                        </td>
                        <td>{{Str::slug($category->url)}}</td>
                        <td>{{$category->created_at->format('H:i:s d/m/Y')}}</td>
                        <td>{{$category->updated_at->format('H:i:s d/m/Y')}}</td>
                        <td class="d-flex justify-content-center">
                            <div class="btn-group text-center" role="group">
                                <button
                                    type="button"
                                    class="btn btn-dark btnUpdate"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalCategoryUpdate"
                                    data-id="{{$category->id}}"
                                >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-warning btnTrash"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalCategoryDelete" data-id="{{$category->id}}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$allCategories->links()}}
    </div>
    {{--Modal Update--}}
    <div class="modal fade" id="modalCategoryUpdate" tabindex="-1" aria-labelledby="modalCategoryUpdate" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCategoryUpdate">Cập nhật danh mục <span class="fw-bolder categories__title"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="updateCategories">
                    @csrf
                <div class="modal-body">
                        <div class="mb-3 categories__input">
                            <label for="recipient-name" class="col-form-label">Tên danh mục</label>
                            <input type="text" class="form-control" name="nameCategoriesUpdate" required>
                            <input type="hidden" class="form-control" name="idCategoriesUpdate">
                            <p class="alert alert-danger my-2 fw-bold text-danger nameCategories__error"></p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary btnAcceptUpdate">Cập nhật</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Delete-->
    <div class="modal fade" id="modalCategoryDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Bạn có muốn xóa danh mục này không?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="alert-danger alert fw-bold text-danger">Xóa danh mục này sẽ xóa tất cả các chuyên mục con
                        thuộc về nó. Vui lòng suy nghĩ kĩ trước khi xóa!</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="acceptDelete">
                        Đồng ý
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    @vite(['resources/js/admin/category','resources/js/admin/validate'])
@endpush


