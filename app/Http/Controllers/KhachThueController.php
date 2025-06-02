<?php

namespace App\Http\Controllers;

use App\Models\KhachThue;
use App\Models\PhongTro; // Import PhongTro model
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Import Rule for validation

class KhachThueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khachThues = KhachThue::with('phongTro')->latest()->paginate(10); // Eager load phongTro relationship
        return view('khach-thues.index', compact('khachThues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $phongTros = PhongTro::all(); // Fetch all rooms
        return view('khach-thues.create', compact('phongTros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ho_ten' => 'required|string|max:255',
            'sdt' => ['nullable', 'string', 'max:15', Rule::unique('khach_thues')->ignore($request->id)],
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('khach_thues')->ignore($request->id)],
            'dia_chi_thuong_tru' => 'nullable|string',
            'ngay_sinh' => 'nullable|date',
            'gioi_tinh' => 'nullable|string|in:Nam,Nữ,Khác',
            'so_cmnd_cccd' => ['nullable', 'string', 'max:20', Rule::unique('khach_thues')->ignore($request->id)],
            'phong_tro_id' => 'nullable|exists:phong_tros,id',
            // Add other validation rules as needed
        ]);

        KhachThue::create($validatedData);

        return redirect()->route('khach-thues.index')
                         ->with('success', 'Khách thuê đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KhachThue $khachThue)
    {
        $khachThue->load('phongTro'); // Eager load phongTro relationship
        return view('khach-thues.show', compact('khachThue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KhachThue $khachThue)
    {
        $phongTros = PhongTro::all(); // Fetch all rooms
        return view('khach-thues.edit', compact('khachThue', 'phongTros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KhachThue $khachThue)
    {
        $validatedData = $request->validate([
            'ho_ten' => 'required|string|max:255',
            'sdt' => ['nullable', 'string', 'max:15', Rule::unique('khach_thues')->ignore($khachThue->id)],
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('khach_thues')->ignore($khachThue->id)],
            'dia_chi_thuong_tru' => 'nullable|string',
            'ngay_sinh' => 'nullable|date',
            'gioi_tinh' => 'nullable|string|in:Nam,Nữ,Khác',
            'so_cmnd_cccd' => ['nullable', 'string', 'max:20', Rule::unique('khach_thues')->ignore($khachThue->id)],
            'phong_tro_id' => 'nullable|exists:phong_tros,id',
            // Add other validation rules as needed
        ]);

        $khachThue->update($validatedData);

        return redirect()->route('khach-thues.index')
                         ->with('success', 'Thông tin khách thuê đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KhachThue $khachThue)
    {
        $khachThue->delete();

        return redirect()->route('khach-thues.index')
                         ->with('success', 'Khách thuê đã được xóa thành công.');
    }
}
