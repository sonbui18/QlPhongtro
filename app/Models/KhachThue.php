<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachThue extends Model
{
    use HasFactory;

    protected $fillable = [
        'ho_ten',
        'sdt',
        'email',
        'dia_chi_thuong_tru',
        'ngay_sinh',
        'gioi_tinh',
        'so_cmnd_cccd',
        'phong_tro_id',
    ];

    public function phongTro()
    {
        return $this->belongsTo(PhongTro::class, 'phong_tro_id');
    }

    public function hoaDons()
    {
        return $this->hasMany(HoaDon::class, 'khach_id');
    }
}
