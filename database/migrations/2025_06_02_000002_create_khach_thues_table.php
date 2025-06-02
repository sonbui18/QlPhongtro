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
        Schema::create('khach_thues', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('sdt')->nullable();
            $table->string('email')->nullable()->unique();
            $table->text('dia_chi_thuong_tru')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('gioi_tinh')->nullable(); // Nam, Nữ, Khác
            $table->string('so_cmnd_cccd')->nullable()->unique();
            $table->foreignId('phong_tro_id')->nullable()->constrained('phong_tros')->onDelete('set null'); // Foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_thues');
    }
};
