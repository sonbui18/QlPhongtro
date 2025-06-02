<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhongTroController;
use App\Http\Controllers\KhachThueController;
use App\Http\Controllers\HoaDonController;

Route::get('/', function () {
    return redirect()->route('phong-tros.index'); // Default to phong-tros index
});

Route::resource('phong-tros', PhongTroController::class);
Route::resource('khach-thues', KhachThueController::class);
Route::resource('hoa-dons', HoaDonController::class); // Ensure this line exists and is correct
