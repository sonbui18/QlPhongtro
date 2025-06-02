@extends('layouts.app')

@section('title', 'Chi Tiết Hóa Đơn')

@section('content')
<div class="container">
    <h1>Chi Tiết Hóa Đơn #{{ $hoaDon->id }}</h1>

    <div class="card">
        <div class="card-header">
            Thông Tin Hóa Đơn
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $hoaDon->id }}</p>
            <p><strong>Khách Thuê:</strong> {{ $hoaDon->khachThue->ho_ten ?? 'N/A' }}</p>
            <p><strong>Phòng Trọ:</strong> {{ $hoaDon->phongTro->ten_phong ?? 'N/A' }}</p>
            <p><strong>Ngày Tạo:</strong> {{ $hoaDon->ngay_tao ? \Carbon\Carbon::parse($hoaDon->ngay_tao)->format('d/m/Y') : 'N/A' }}</p>
            <p><strong>Tổng Tiền:</strong> {{ number_format($hoaDon->tong_tien, 0, ',', '.') }} VNĐ</p>
            <p><strong>Trạng Thái:</strong> <span class="badge {{ $hoaDon->trang_thai == 'đã thanh toán' ? 'bg-success' : 'bg-warning text-dark' }}">{{ ucfirst($hoaDon->trang_thai) }}</span></p>
            <p><strong>Ghi Chú:</strong> {{ $hoaDon->ghi_chu ?? 'Không có' }}</p>
            <p><strong>Ngày Tạo Phiếu:</strong> {{ $hoaDon->created_at->format('d/m/Y H:i:s') }}</p>
            <p><strong>Ngày Cập Nhật:</strong> {{ $hoaDon->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>

    <a href="{{ route('hoa-dons.edit', $hoaDon->id) }}" class="btn btn-warning mt-3">Sửa</a>
    <a href="{{ route('hoa-dons.index') }}" class="btn btn-secondary mt-3">Quay Lại Danh Sách</a>
</div>
@endsection
