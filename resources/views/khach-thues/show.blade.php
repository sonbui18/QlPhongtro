@extends('layouts.app') {{-- Or your main layout file --}}

@section('content')
<div class="container">
    <h1>Chi Tiết Khách Thuê</h1>

    <div class="card">
        <div class="card-header">
            Thông tin Khách Thuê #{{ $khachThue->id }}
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label"><strong>Họ Tên:</strong></label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $khachThue->ho_ten }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label"><strong>Số Điện Thoại:</strong></label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $khachThue->sdt ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label"><strong>Email:</strong></label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $khachThue->email ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label"><strong>Địa chỉ thường trú:</strong></label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $khachThue->dia_chi_thuong_tru ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label"><strong>Ngày Sinh:</strong></label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $khachThue->ngay_sinh ? date('d/m/Y', strtotime($khachThue->ngay_sinh)) : 'N/A' }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label"><strong>Giới tính:</strong></label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $khachThue->gioi_tinh ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label"><strong>Số CMND/CCCD:</strong></label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $khachThue->so_cmnd_cccd ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label"><strong>Phòng Trọ:</strong></label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $khachThue->phongTro->ten_phong ?? 'Chưa có phòng' }}</p> {{-- Assuming PhongTro model has 'ten_phong' --}}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label"><strong>Ngày tạo:</strong></label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $khachThue->created_at ? $khachThue->created_at->format('d/m/Y H:i:s') : 'N/A' }}</p>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label"><strong>Ngày cập nhật:</strong></label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext">{{ $khachThue->updated_at ? $khachThue->updated_at->format('d/m/Y H:i:s') : 'N/A' }}</p>
                </div>
            </div>

            {{-- Add other fields as necessary --}}

        </div>
        <div class="card-footer">
            <a href="{{ route('khach-thues.edit', $khachThue->id) }}" class="btn btn-warning">Sửa</a>
            <a href="{{ route('khach-thues.index') }}" class="btn btn-secondary">Quay lại Danh sách</a>
        </div>
    </div>
</div>
@endsection
