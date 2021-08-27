<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
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
        'ta3',
        'toan4',
        'tv4',
        'ta4',
        'kh4',
        'sd4',
        'toan5',
        'tv5',
        'ta5',
        'kh5',
        'sd5',
        'tong',
        'dien_uu_tien',
        'diem_uu_tien',
        'giai',
        'diem_giai',
        'cac_giai',
        'diem_xet_tuyen',
    ];

    const MAP_FIELD = [
        'stt',
//        'ma_ho_so',
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
//        'email',
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
        'ta3',
        'toan4',
        'tv4',
        'ta4',
        'kh4',
        'sd4',
        'toan5',
        'tv5',
        'ta5',
        'kh5',
        'sd5',
        'tong',
        'dien_uu_tien',
        'diem_uu_tien',
        'giai',
        'diem_giai',
        'cac_giai',
        'diem_xet_tuyen',
    ];

    public function getNgaySinhAttribute($value)
    {
        if (!empty($value)) {
            return date("d/m/Y", strtotime($value));
        }
        return '';
    }
}
