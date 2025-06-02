<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTro extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_phong',
        'dia_chi',
        'gia_thue',
        'mo_ta',
        'dien_tich',
        'so_luong_nguoi_o_toi_da',
        'tien_dien',
        'tien_nuoc',
        'tien_internet',
        'tien_rac',
        'trang_thai',
    ];

    public function khachThues()
    {
        return $this->hasMany(KhachThue::class, 'phong_tro_id');
    }

    public function hoaDons()
    {
        return $this->hasMany(HoaDon::class, 'phong_id');
    }
}
