@extends('layouts.app')

@section('title', 'Sửa Hóa Đơn')

@section('content')
<div class="container">
    <h1>Sửa Hóa Đơn #{{ $hoaDon->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hoa-dons.update', $hoaDon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="khach_thue_id" class="form-label">Khách Thuê</label>
            <select class="form-select" id="khach_thue_id" name="khach_thue_id" required>
                <option value="">Chọn khách thuê</option>
                @foreach ($khachThues as $khachThue)
                    <option value="{{ $khachThue->id }}" {{ old('khach_thue_id', $hoaDon->khach_thue_id) == $khachThue->id ? 'selected' : '' }}>
                        {{ $khachThue->ho_ten }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="phong_tro_id" class="form-label">Phòng Trọ</label>
            <select class="form-select" id="phong_tro_id" name="phong_tro_id" required>
                <option value="">Chọn phòng trọ</option>
                @foreach ($phongTros as $phongTro)
                    <option value="{{ $phongTro->id }}" {{ old('phong_tro_id', $hoaDon->phong_tro_id) == $phongTro->id ? 'selected' : '' }}>
                        {{ $phongTro->ten_phong }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ngay_tao" class="form-label">Ngày Tạo</label>
            <input type="date" class="form-control" id="ngay_tao" name="ngay_tao" value="{{ old('ngay_tao', \Carbon\Carbon::parse($hoaDon->ngay_tao)->format('Y-m-d')) }}" required>
        </div>
        <div class="mb-3">
            <label for="tong_tien" class="form-label">Tổng Tiền (VNĐ)</label>
            <input type="number" class="form-control" id="tong_tien" name="tong_tien" value="{{ old('tong_tien', $hoaDon->tong_tien) }}" required min="0">
        </div>
        <div class="mb-3">
            <label for="trang_thai" class="form-label">Trạng Thái</label>
            <select class="form-select" id="trang_thai" name="trang_thai" required>
                <option value="chưa thanh toán" {{ old('trang_thai', $hoaDon->trang_thai) == 'chưa thanh toán' ? 'selected' : '' }}>Chưa Thanh Toán</option>
                <option value="đã thanh toán" {{ old('trang_thai', $hoaDon->trang_thai) == 'đã thanh toán' ? 'selected' : '' }}>Đã Thanh Toán</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ghi_chu" class="form-label">Ghi Chú</label>
            <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3">{{ old('ghi_chu', $hoaDon->ghi_chu) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật Hóa Đơn</button>
        <a href="{{ route('hoa-dons.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
