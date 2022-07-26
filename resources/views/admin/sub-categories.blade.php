@extends('layouts.admin.master')
@section('title', $title)
@section('content')
    <h1 class="mt-4">Quản Lí Chuyên Mục</h1>
    {{Breadcrumbs::render('sub-categories')}}
    <div class="container table-responsive">
        <div class="d-flex justify-content-lg-between justify-content-sm-start justify-content-md-start gap-md-2">
            <div class="my-2">
                <button class="btn btn-dark">
                    <input type="checkbox" class="form-check-input subCategories__inputCheckAll">
                    Chọn tất cả
                </button>
                <button class="btn btn-dark subCategories__btnDeleteAll" data-bs-toggle="modal"
                        data-bs-target="#modalSubCategoryDelete">Xoá
                </button>
            </div>
            <div class="my-2">
                <button class="btn btn-dark">
                    <a href="{{url('admin/add-sub-categories')}}" class="text-decoration-none text-white">Thêm</a>
                </button>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead class="align-middle">
            <tr class="text-capitalize">
                <th>#</th>
                <th>tên chuyên mục</th>
                <th>đường dẫn</th>
                <th>danh mục</th>
                <th>ngày tạo</th>
                <th>ngày cập nhật</th>
                <th>hành động</th>
            </tr>
            </thead>
            <tbody class="align-middle">
            @foreach($listAllSubCategories as $subCategories)
                <tr data-id-subcategories="{{$subCategories->id}}" class="subCategories__item">
                    <td>
                        <input type="checkbox" name="subCategoriesId" value="{{$subCategories->id}}"
                               class="form-check-input">
                    </td>
                    <td>
                        {{Str::ucfirst($subCategories->name)}}
                        <input type="hidden" name="subCategoriesName" data-id-sub-categories="{{$subCategories->id}}"
                               value="{{Str::ucfirst($subCategories->name)}}">
                    </td>
                    <td>{{Str::slug($subCategories->url)}}</td>
                    <td>
                            {{$subCategories->categories->name}}
                    </td>
                    <td>{{$subCategories->created_at->format('H:i:s d/m/Y')}}</td>
                    <td>{{$subCategories->updated_at->format('H:i:s d/m/Y')}}</td>
                    <td class="d-flex justify-content-center">
                        <div class="btn-group text-center" role="group">
                            <button
                                type="button"
                                class="btn btn-dark btnUpdate"
                                data-bs-toggle="modal"
                                data-bs-target="#modalSubCategoryUpdate"
                                data-id="{{$subCategories->id}}"
                                data-id-categories="{{$subCategories->categories->id}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button
                                type="button"
                                class="btn btn-warning btnTrash"
                                data-bs-toggle="modal"
                                data-bs-target="#modalSubCategoryDelete" data-id="{{$subCategories->id}}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$listAllSubCategories->links()}}
    </div>
    <!-- Modal Delete-->
    <div class="modal fade show" id="modalSubCategoryDelete" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Bạn có muốn xóa chuyên mục này không?</h5>
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
    </div>
    {{--Modal Update--}}
    <div class="modal fade" id="modalSubCategoryUpdate" tabindex="-1" aria-labelledby="modalSubCategoryUpdate"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSubCategoryUpdate">Cập nhật chuyên mục <span
                            class="fw-bolder subCategories__title"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="updateSubCategories">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="col-form-label">Danh mục:</label>
                            <select name="categories" id="" class="form-select"></select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tên chuyên mục:</label>
                            <input type="text" class="form-control" name="nameSubCategories" required>
                            <input type="hidden" class="form-control" name="idSubCategories">
                            <p class="alert alert-danger my-2 fw-bold text-danger nameSubCategories__error"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary btnAcceptUpdate">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    @vite('resources/js/admin/sub-categories')
@endpush
