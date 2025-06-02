@extends('layouts.app')

@section('title', 'Sửa Thông Tin Phòng Trọ')

@section('content')
<div class="container">
    <h1>Sửa Thông Tin Phòng Trọ: {{ $phongTro->ten_phong }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('phong-tros.update', $phongTro->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="ten_phong" class="form-label">Tên Phòng</label>
            <input type="text" class="form-control" id="ten_phong" name="ten_phong" value="{{ old('ten_phong', $phongTro->ten_phong) }}" required>
        </div>
        <div class="mb-3">
            <label for="dia_chi" class="form-label">Địa Chỉ</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ old('dia_chi', $phongTro->dia_chi) }}" required>
        </div>
        <div class="mb-3">
            <label for="gia_thue" class="form-label">Giá Thuê (VNĐ)</label>
            <input type="number" class="form-control" id="gia_thue" name="gia_thue" value="{{ old('gia_thue', $phongTro->gia_thue) }}" required min="0">
        </div>
        <div class="mb-3">
            <label for="mo_ta" class="form-label">Mô Tả</label>
            <textarea class="form-control" id="mo_ta" name="mo_ta">{{ old('mo_ta', $phongTro->mo_ta) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="dien_tich" class="form-label">Diện Tích (m²)</label>
            <input type="number" step="0.01" class="form-control" id="dien_tich" name="dien_tich" value="{{ old('dien_tich', $phongTro->dien_tich) }}" required min="0">
        </div>
        <div class="mb-3">
            <label for="so_luong_nguoi_o_toi_da" class="form-label">Số Người Ở Tối Đa</label>
            <input type="number" class="form-control" id="so_luong_nguoi_o_toi_da" name="so_luong_nguoi_o_toi_da" value="{{ old('so_luong_nguoi_o_toi_da', $phongTro->so_luong_nguoi_o_toi_da) }}" required min="1">
        </div>
        <div class="mb-3">
            <label for="tien_dien" class="form-label">Tiền Điện (VNĐ/kWh)</label>
            <input type="number" class="form-control" id="tien_dien" name="tien_dien" value="{{ old('tien_dien', $phongTro->tien_dien) }}" min="0">
        </div>
        <div class="mb-3">
            <label for="tien_nuoc" class="form-label">Tiền Nước (VNĐ/m³)</label>
            <input type="number" class="form-control" id="tien_nuoc" name="tien_nuoc" value="{{ old('tien_nuoc', $phongTro->tien_nuoc) }}" min="0">
        </div>
        <div class="mb-3">
            <label for="tien_internet" class="form-label">Tiền Internet (VNĐ/tháng)</label>
            <input type="number" class="form-control" id="tien_internet" name="tien_internet" value="{{ old('tien_internet', $phongTro->tien_internet) }}" min="0">
        </div>
        <div class="mb-3">
            <label for="tien_rac" class="form-label">Tiền Rác (VNĐ/tháng)</label>
            <input type="number" class="form-control" id="tien_rac" name="tien_rac" value="{{ old('tien_rac', $phongTro->tien_rac) }}" min="0">
        </div>
        <div class="mb-3">
            <label for="trang_thai" class="form-label">Trạng Thái</label>
            <select class="form-select" id="trang_thai" name="trang_thai" required>
                <option value="còn trống" {{ old('trang_thai', $phongTro->trang_thai) == 'còn trống' ? 'selected' : '' }}>Còn Trống</option>
                <option value="đã thuê" {{ old('trang_thai', $phongTro->trang_thai) == 'đã thuê' ? 'selected' : '' }}>Đã Thuê</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
        <a href="{{ route('phong-tros.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
