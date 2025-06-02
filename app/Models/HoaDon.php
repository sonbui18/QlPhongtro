<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;

    protected $fillable = [
        'phong_id',
        'khach_id',
        'thang',
        'nam',
        'tien_phong',
        'tien_dien',
        'tien_nuoc',
        'tien_dich_vu',
        'trang_thai',
        'ngay_thanh_toan',
    ];

    public function phongTro()
    {
        return $this->belongsTo(PhongTro::class, 'phong_id');
    }

    public function khachThue()
    {
        return $this->belongsTo(KhachThue::class, 'khach_id');
    }
}
