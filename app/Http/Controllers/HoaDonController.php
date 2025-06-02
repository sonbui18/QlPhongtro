<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\KhachThue;
use App\Models\PhongTro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hoaDons = HoaDon::with(['khachThue', 'phongTro'])->latest()->paginate(10);
        return view('hoa-dons.index', compact('hoaDons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $khachThues = KhachThue::orderBy('ho_ten')->get();
        $phongTros = PhongTro::orderBy('ten_phong')->get();
        return view('hoa-dons.create', compact('khachThues', 'phongTros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'khach_thue_id' => 'required|exists:khach_thues,id',
            'phong_tro_id' => 'required|exists:phong_tros,id',
            'ngay_tao' => 'required|date',
            'tong_tien' => 'required|numeric|min:0',
            'trang_thai' => ['required', 'string', Rule::in(['chưa thanh toán', 'đã thanh toán'])],
            'ghi_chu' => 'nullable|string',
        ]);

        HoaDon::create($validatedData);

        return redirect()->route('hoa-dons.index')
                         ->with('success', 'Hóa đơn đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HoaDon $hoaDon)
    {
        $hoaDon->load(['khachThue', 'phongTro']);
        return view('hoa-dons.show', compact('hoaDon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HoaDon $hoaDon)
    {
        $khachThues = KhachThue::orderBy('ho_ten')->get();
        $phongTros = PhongTro::orderBy('ten_phong')->get();
        return view('hoa-dons.edit', compact('hoaDon', 'khachThues', 'phongTros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HoaDon $hoaDon)
    {
        $validatedData = $request->validate([
            'khach_thue_id' => 'required|exists:khach_thues,id',
            'phong_tro_id' => 'required|exists:phong_tros,id',
            'ngay_tao' => 'required|date',
            'tong_tien' => 'required|numeric|min:0',
            'trang_thai' => ['required', 'string', Rule::in(['chưa thanh toán', 'đã thanh toán'])],
            'ghi_chu' => 'nullable|string',
        ]);

        $hoaDon->update($validatedData);

        return redirect()->route('hoa-dons.index')
                         ->with('success', 'Hóa đơn đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HoaDon $hoaDon)
    {
        $hoaDon->delete();

        return redirect()->route('hoa-dons.index')
                         ->with('success', 'Hóa đơn đã được xóa thành công.');
    }
}
