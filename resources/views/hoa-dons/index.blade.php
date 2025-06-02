@extends('layouts.app')

@section('title', 'Danh Sách Hóa Đơn')

@section('content')
<div class="container">
    <h1>Danh Sách Hóa Đơn</h1>
    <a href="{{ route('hoa-dons.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Thêm Hóa Đơn Mới</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Khách Thuê</th>
                <th>Phòng Trọ</th>
                <th>Ngày Tạo</th>
                <th>Tổng Tiền (VNĐ)</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hoaDons as $hoaDon)
                <tr>
                    <td>{{ $hoaDon->id }}</td>
                    <td>{{ $hoaDon->khachThue->ho_ten ?? 'N/A' }}</td>
                    <td>{{ $hoaDon->phongTro->ten_phong ?? 'N/A' }}</td>
                    <td>{{ $hoaDon->ngay_tao ? \Carbon\Carbon::parse($hoaDon->ngay_tao)->format('d/m/Y') : 'N/A' }}</td>
                    <td>{{ number_format($hoaDon->tong_tien, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge {{ $hoaDon->trang_thai == 'đã thanh toán' ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ ucfirst($hoaDon->trang_thai) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('hoa-dons.show', $hoaDon->id) }}" class="btn btn-info btn-sm me-1"><i class="bi bi-eye"></i> Xem</a>
                        <a href="{{ route('hoa-dons.edit', $hoaDon->id) }}" class="btn btn-warning btn-sm me-1"><i class="bi bi-pencil-square"></i> Sửa</a>
                        <form action="{{ route('hoa-dons.destroy', $hoaDon->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này?')"><i class="bi bi-trash"></i> Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Chưa có hóa đơn nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if($hoaDons->hasPages())
        <div class="d-flex justify-content-center">
            {{ $hoaDons->links() }}
        </div>
    @endif
</div>
@endsection
