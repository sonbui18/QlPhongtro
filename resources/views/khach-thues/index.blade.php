@extends('layouts.app')

@section('title', 'Danh Sách Khách Thuê')

@section('content')
<div class="container">
    <h1>Danh Sách Khách Thuê</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('khach-thues.create') }}" class="btn btn-primary">Thêm Khách Thuê Mới</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ Tên</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Phòng Trọ</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($khachThues as $khachThue)
                <tr>
                    <td>{{ $khachThue->id }}</td>
                    <td>{{ $khachThue->ho_ten }}</td>
                    <td>{{ $khachThue->sdt }}</td>
                    <td>{{ $khachThue->email }}</td>
                    <td>{{ $khachThue->phongTro->ten_phong ?? 'Chưa có phòng' }}</td> {{-- Assuming PhongTro model has 'ten_phong' --}}
                    <td>
                        <a href="{{ route('khach-thues.show', $khachThue->id) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('khach-thues.edit', $khachThue->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('khach-thues.destroy', $khachThue->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa khách thuê này không?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Không có khách thuê nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination Links --}}
    @if($khachThues->hasPages())
        <div class="mt-3">
            {{ $khachThues->links() }}
        </div>
    @endif

</div>
@endsection
