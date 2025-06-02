<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phong_tro_id')->constrained('phong_tros')->onDelete('cascade'); // Đã đổi tên và thêm onDelete
            $table->foreignId('khach_thue_id')->constrained('khach_thues')->onDelete('cascade'); // Đã đổi tên và thêm onDelete
            $table->date('ngay_tao'); // Thêm mới
            $table->decimal('tong_tien', 15, 2); // Thêm mới
            $table->string('trang_thai'); // Giữ lại: 'chưa thanh toán' hoặc 'đã thanh toán'
            $table->text('ghi_chu')->nullable(); // Thêm mới
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_dons');
    }
};
