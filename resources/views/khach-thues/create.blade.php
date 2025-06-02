@extends('layouts.app')

@section('title', 'Thêm Khách Thuê Mới')

@section('content')
<div class="container">
    <h1>Thêm Khách Thuê Mới</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('khach-thues.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="ho_ten">Họ Tên:</label>
            <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="{{ old('ho_ten') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="sdt">Số Điện Thoại:</label>
            <input type="text" class="form-control" id="sdt" name="sdt" value="{{ old('sdt') }}">
        </div>

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group mb-3">
            <label for="dia_chi_thuong_tru">Địa chỉ thường trú:</label>
            <textarea class="form-control" id="dia_chi_thuong_tru" name="dia_chi_thuong_tru">{{ old('dia_chi_thuong_tru') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="ngay_sinh">Ngày Sinh:</label>
            <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="{{ old('ngay_sinh') }}">
        </div>

        <div class="form-group mb-3">
            <label for="gioi_tinh">Giới tính:</label>
            <select class="form-control" id="gioi_tinh" name="gioi_tinh">
                <option value="Nam" {{ old('gioi_tinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ old('gioi_tinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                <option value="Khác" {{ old('gioi_tinh') == 'Khác' ? 'selected' : '' }}>Khác</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="so_cmnd_cccd">Số CMND/CCCD:</label>
            <input type="text" class="form-control" id="so_cmnd_cccd" name="so_cmnd_cccd" value="{{ old('so_cmnd_cccd') }}">
        </div>

        <div class="form-group mb-3">
            <label for="phong_tro_id">Phòng Trọ:</label>
            <select class="form-control" id="phong_tro_id" name="phong_tro_id">
                <option value="">Chọn phòng trọ</option>
                @if(isset($phongTros))
                    @foreach ($phongTros as $phong)
                        <option value="{{ $phong->id }}" {{ old('phong_tro_id') == $phong->id ? 'selected' : '' }}>
                            {{ $phong->ten_phong ?? $phong->id }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm Mới</button>
        <a href="{{ route('khach-thues.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
