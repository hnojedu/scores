<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student2 extends Model
{
    use HasFactory;

    protected $table = 'students2';

    protected $fillable = [
        'truong_tieu_hoc',
        'quan_huyen',
        'ma_hoc_sinh',
        'lop',
        'ho_ten',
        'ngay_sinh',
        'thang_sinh',
        'nam_sinh',
        'gioi_tinh',    
        'noi_sinh',
        'dan_toc',
        'ho_khau_thuong_tru',
        'dien_thoai',
        'diem_nam_1',
        'diem_nam_2',
        'diem_nam_3',
        'diem_nam_4',
        'diem_nam_5',
        'tong_diem_5_nam',
        'diem_uu_tien',
        'tong_diem_so_tuyen',
    ];

    const MAP_FIELD = [
        'stt',
        'truong_tieu_hoc',
        'quan_huyen',
        'ma_hoc_sinh',
        'lop',
        'ho_ten',
        'ngay_sinh',
        'thang_sinh',
        'nam_sinh',
        'gioi_tinh',    
        'noi_sinh',
        'dan_toc',
        'ho_khau_thuong_tru',
        'dien_thoai',
        'diem_nam_1',
        'diem_nam_2',
        'diem_nam_3',
        'diem_nam_4',
        'diem_nam_5',
        'tong_diem_5_nam',
        'diem_uu_tien',
        'tong_diem_so_tuyen',
    ];
}
