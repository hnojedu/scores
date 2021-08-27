<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('ma_ho_so');
            $table->string('ma_hoc_sinh');
            $table->string('ho_ten');
            $table->string('gioi_tinh');
            $table->timestamp('ngay_sinh')->nullable();
            $table->string('noi_sinh');
            $table->string('dan_toc');
            $table->string('thanh_pho');
            $table->string('quan_huyen');
            $table->string('xa_phuong');
            $table->string('pho_thon');
            $table->string('nha');
            $table->string('dien_thoai');
            $table->string('email');
            $table->string('phong_gd');
            $table->string('tieu_hoc');
            $table->string('L5');
            $table->string('kt1');
            $table->string('kt2');
            $table->string('kt3');
            $table->string('kt4');
            $table->string('kt5');
            $table->float('toan1');
            $table->float('tv1');
            $table->float('toan2');
            $table->float('tv2');
            $table->float('toan3');
            $table->float('tv3');
            $table->float('ta3');
            $table->float('toan4');
            $table->float('tv4');
            $table->float('ta4');
            $table->float('kh4');
            $table->float('sd4');
            $table->float('toan5');
            $table->float('tv5');
            $table->float('ta5');
            $table->float('kh5');
            $table->float('sd5');
            $table->float('tong');
            $table->string('dien_uu_tien');
            $table->float('diem_uu_tien');
            $table->string('giai');
            $table->float('diem_giai');
            $table->string('cac_giai');
            $table->float('diem_xet_tuyen');
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
        Schema::dropIfExists('students');
    }
}
