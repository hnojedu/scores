<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    protected $fillable  = [
        'ma_ho_so',
        'ma_hoc_sinh',
        'ho_ten',
        'gioi_tinh',
        'ngay_sinh',
        'noi_sinh',
        'dan_toc',
        'thanh_pho',
        'quan_huyen',
        'xa_phuong',
        'pho_thon',
        'nha',
        'dien_thoai',
        'email',
        'phong_gd',
        'tieu_hoc',
        'L5',
        'kt1',
        'kt2',
        'kt3',
        'kt4',
        'kt5',
        'toan1',
        'tv1',
        'toan2',
        'tv2',
        'toan3',
        'tv3',
        'toan4',
        'tv4',
        'toan5',
        'tv5',
        'tong',
        'dien_uu_tien',
        'diem_uu_tien',
        'giai',
        'diem_giai',
        'cac_giai',
        'diem_xet_tuyen',
    ];
}
