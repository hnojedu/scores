<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student3 extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_hoc_sinh',
        'so_bao_danh',
        'tieng_viet',
        'tieng_anh',
        'toan',
        'tong_diem',
    ];

    const MAP_FIELD = [
        'stt',
        'ma_hoc_sinh',
        'so_bao_danh',
        'tieng_viet',
        'tieng_anh',
        'toan',
        'tong_diem',
    ];
}
