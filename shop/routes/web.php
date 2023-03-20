<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('trang-chu',[
    'as'=>'trangchu',
    'uses'=>'App\Http\Controllers\PageController@getIndex']);

Route::get('loai-san-pham/{type}',[
    'as'=>'loaisanpham',
    'uses'=>'App\Http\Controllers\PageController@getLoaiSp']);

Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'chitietsanpham',
    'uses'=>'App\Http\Controllers\PageController@getCTSp']);

Route::get('lien-he',[
    'as'=>'lienhe',
    'uses'=>'App\Http\Controllers\PageController@getLienHe']);

Route::get('gioi-thieu',[
    'as'=>'gioithieu',
    'uses'=>'App\Http\Controllers\PageController@getGioiThieu']);
Route::get('them-vao-gio-hang/{id}',[
    'as'=>'themvaogiohang',
    'uses'=>'App\Http\Controllers\PageController@getThemVaoGioHang']);
Route::get('xoa-khoi-gio-hang/{id}',[
    'as'=>'xoakhoigiohang',
    'uses'=>'App\Http\Controllers\PageController@getXoaKhoiGioHang']);
Route::get('dat-hang',[
    'as'=>'dathang',
    'uses'=>'App\Http\Controllers\PageController@getDatHang']);
Route::post('dat-hang',[
    'as'=>'dathang',
    'uses'=>'App\Http\Controllers\PageController@postDatHang']);
Route::get('dang-nhap',[
    'as'=>'dangnhap',
    'uses'=>'App\Http\Controllers\PageController@getDangNhap']);
Route::post('dang-nhap',[
    'as'=>'dangnhap',
    'uses'=>'App\Http\Controllers\PageController@postDangNhap']);
Route::get('dang-ky',[
    'as'=>'dangky',
    'uses'=>'App\Http\Controllers\PageController@getDangKy']);
Route::post('dang-ky',[
    'as'=>'dangky',
    'uses'=>'App\Http\Controllers\PageController@postDangKy']);
Route::get('dang-xuat',[
    'as'=>'dangxuat',
    'uses'=>'App\Http\Controllers\PageController@postDangXuat']);
Route::get('tim-kiem',[
    'as'=>'timkiem',
    'uses'=>'App\Http\Controllers\PageController@getTimKiem']);

