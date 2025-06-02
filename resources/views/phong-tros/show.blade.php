@extends('layouts.app')

@section('title', 'Chi Tiết Phòng Trọ')

@section('content')
<div class="container">
    <h1>Chi Tiết Phòng Trọ: {{ $phongTro->so_phong }}</h1>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $phongTro->id }}</td>
            </tr>
            <tr>
                <th>Số Phòng</th>
                <td>{{ $phongTro->so_phong }}</td>
            </tr>
            <tr>
                <th>Diện Tích</th>
                <td>{{ $phongTro->dien_tich }} m²</td>
            </tr>
            <tr>
                <th>Tình Trạng</th>
                <td>{{ $phongTro->tinh_trang }}</td>
            </tr>
            <tr>
                <th>Số Người Ở Tối Đa</th>
                <td>{{ $phongTro->nguoi_o }}</td>
            </tr>
            <tr>
                <th>Ngày Tạo</th>
                <td>{{ $phongTro->created_at ? $phongTro->created_at->format('d/m/Y H:i:s') : 'N/A' }}</td>
            </tr>
            <tr>
                <th>Ngày Cập Nhật</th>
                <td>{{ $phongTro->updated_at ? $phongTro->updated_at->format('d/m/Y H:i:s') : 'N/A' }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('phong-tros.edit', $phongTro->id) }}" class="btn btn-warning">Sửa</a>
    <a href="{{ route('phong-tros.index') }}" class="btn btn-secondary">Quay Lại Danh Sách</a>
</div>
@endsection
