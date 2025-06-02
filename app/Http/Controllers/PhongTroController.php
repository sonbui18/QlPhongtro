<?php

namespace App\Http\Controllers;

use App\Models\PhongTro;
use Illuminate\Http\Request;

class PhongTroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phongTros = PhongTro::latest()->paginate(10); // Lấy 10 phòng trọ mới nhất, có phân trang
        return view('phong-tros.index', compact('phongTros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('phong-tros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten_phong' => 'required|string|max:255|unique:phong_tros', // Changed from so_phong
            'dia_chi' => 'required|string|max:255',
            'gia_thue' => 'required|numeric|min:0',
            'mo_ta' => 'nullable|string',
            'dien_tich' => 'required|numeric|min:0',
            'so_luong_nguoi_o_toi_da' => 'required|integer|min:1',
            'tien_dien' => 'nullable|numeric|min:0',
            'tien_nuoc' => 'nullable|numeric|min:0',
            'tien_internet' => 'nullable|numeric|min:0',
            'tien_rac' => 'nullable|numeric|min:0',
            'trang_thai' => 'required|string|in:còn trống,đã thuê', // Changed from tinh_trang
        ]);

        PhongTro::create($request->all());

        return redirect()->route('phong-tros.index')
                         ->with('success', 'Phòng trọ đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhongTro $phongTro)
    {
        return view('phong-tros.show', compact('phongTro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhongTro $phongTro)
    {
        return view('phong-tros.edit', compact('phongTro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhongTro $phongTro)
    {
        $request->validate([
            'ten_phong' => 'required|string|max:255|unique:phong_tros,ten_phong,'. $phongTro->id, // Changed from so_phong
            'dia_chi' => 'required|string|max:255',
            'gia_thue' => 'required|numeric|min:0',
            'mo_ta' => 'nullable|string',
            'dien_tich' => 'required|numeric|min:0',
            'so_luong_nguoi_o_toi_da' => 'required|integer|min:1',
            'tien_dien' => 'nullable|numeric|min:0',
            'tien_nuoc' => 'nullable|numeric|min:0',
            'tien_internet' => 'nullable|numeric|min:0',
            'tien_rac' => 'nullable|numeric|min:0',
            'trang_thai' => 'required|string|in:còn trống,đã thuê', // Changed from tinh_trang
        ]);

        $phongTro->update($request->all());

        return redirect()->route('phong-tros.index')
                         ->with('success', 'Thông tin phòng trọ đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhongTro $phongTro)
    {
        $phongTro->delete();

        return redirect()->route('phong-tros.index')
                         ->with('success', 'Phòng trọ đã được xóa thành công.');
    }
}