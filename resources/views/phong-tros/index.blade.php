@extends('layouts.app')

@section('title', 'Danh Sách Phòng Trọ')

@section('content')
<div class="container">
    <h1>Danh Sách Phòng Trọ</h1>
    <a href="{{ route('phong-tros.create') }}" class="btn btn-primary mb-3">Thêm Phòng Trọ Mới</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Tên Phòng</th>
                <th>Địa Chỉ</th>
                <th>Giá Thuê (VNĐ)</th>
                <th>Diện Tích (m²)</th>
                <th>Sức Chứa (Người)</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($phongTros as $phongTro)
                <tr>
                    <td>{{ $phongTro->id }}</td>
                    <td>{{ $phongTro->ten_phong }}</td>
                    <td>{{ $phongTro->dia_chi }}</td>
                    <td>{{ number_format($phongTro->gia_thue, 0, ',', '.') }}</td>
                    <td>{{ $phongTro->dien_tich }}</td>
                    <td>{{ $phongTro->so_luong_nguoi_o_toi_da }}</td>
                    <td>
                        <span class="badge {{ $phongTro->trang_thai == 'còn trống' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($phongTro->trang_thai) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('phong-tros.show', $phongTro->id) }}" class="btn btn-info btn-sm me-1"><i class="bi bi-eye"></i> Xem</a>
                        <a href="{{ route('phong-tros.edit', $phongTro->id) }}" class="btn btn-warning btn-sm me-1"><i class="bi bi-pencil-square"></i> Sửa</a>
                        <form action="{{ route('phong-tros.destroy', $phongTro->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa phòng trọ này cùng với các khách thuê và hóa đơn liên quan (nếu có)?')"><i class="bi bi-trash"></i> Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Không có phòng trọ nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $phongTros->links() }} 
    </div>

</div>
@endsection
