<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\Categories;

/*Admin Breadcrums*/
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Trang Chủ', route('Dashboard'));
});
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Danh Mục', route('Categories'));
});
/*Breadcrumbs::for('editCategory', function (BreadcrumbTrail $trail,Categories $category) {
    $trail->parent('categories');
    $trail->push(Str::title('cập nhật '.$category->name), route('EditCategories', $category));
});*/
Breadcrumbs::for('sub-categories', function (BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Chuyên Mục', route('SubCategories'));
});
/*
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('admin.dashboard', $category));
});*/
