<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;

    protected $fillable = [
        'phong_tro_id', // Đã đổi từ phong_id
        'khach_thue_id', // Đã đổi từ khach_id
        'ngay_tao',      // Thêm dựa trên controller
        'tong_tien',     // Thêm dựa trên controller
        // 'thang',
        // 'nam',
        // 'tien_phong',
        // 'tien_dien',
        // 'tien_nuoc',
        // 'tien_dich_vu',
        'trang_thai',
        'ghi_chu',       // Thêm dựa trên controller
        // 'ngay_thanh_toan',
    ];

    public function phongTro()
    {
        return $this->belongsTo(PhongTro::class, 'phong_tro_id'); // Đổi khóa ngoại
    }

    public function khachThue()
    {
        return $this->belongsTo(KhachThue::class, 'khach_thue_id'); // Đổi khóa ngoại
    }
}
