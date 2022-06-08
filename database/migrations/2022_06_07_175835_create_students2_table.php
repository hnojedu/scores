<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudents2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students2', function (Blueprint $table) {
            $table->id();
            $table->string('truong_tieu_hoc');
            $table->string('quan_huyen');
            $table->string('ma_hoc_sinh');
            $table->string('lop');
            $table->string('ho_ten');
            $table->tinyInteger('ngay_sinh');
            $table->tinyInteger('thang_sinh');
            $table->smallInteger('nam_sinh');
            $table->timestamp('ngay_ra_doi')->nullable();
            $table->string('gioi_tinh');
            $table->string('noi_sinh');
            $table->string('dan_toc');
            $table->string('ho_khau_thuong_tru');            
            $table->string('dien_thoai');
            $table->float('diem_nam_1');
            $table->float('diem_nam_2');
            $table->float('diem_nam_3');
            $table->float('diem_nam_4');
            $table->float('diem_nam_5');
            $table->float('tong_diem_5_nam');
            $table->float('diem_uu_tien');
            $table->float('tong_diem_so_tuyen');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students2');
    }
}
