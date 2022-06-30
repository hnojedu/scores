<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudent3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student3s', function (Blueprint $table) {
            $table->id();
            $table->string('ma_hoc_sinh');
            $table->string('so_bao_danh');
            $table->string('tieng_viet');
            $table->string('tieng_anh');
            $table->string('toan');
            $table->string('tong_diem');
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
        Schema::dropIfExists('student3s');
    }
}
