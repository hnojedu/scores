<?php

namespace App\Http\Controllers;

use App\Console\Commands\ImportStudent;
use App\Models\Student;
use App\Models\Student3;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    public function search(Request $request)
    {
//        $fullname = $request->input('fullname');
        $studentCode = $request->input('studentcode');
        $sbd = $request->input('sbd');

        $student = Student3::where('ma_hoc_sinh', $studentCode)->orWhere('so_bao_danh', $sbd)->get();

        if ($student->isEmpty()) {
            return response()->json(null, 404);
        }

        return response()->json(['data' => $student], 200);
    }

    public function import(Request $request)
    {
        $secret = $request->input('secret');
        if ($secret !== 'y3exdBGezj8FMqCB') {
            return response()->json(['data' => 'Fail to load.'], 404);
        }
        $file = $request->file('file_students');
        $path = Storage::putFile('public/students', $file);
        $absPath = Storage::path($path);
        $cmd = new ImportStudent();
        $r = $cmd->v4($absPath);
        if ($r['total'] > 0) {
            $message = 'Tổng số dòng: ' . $r['total'] . '. Imported: ' . $r['success'] . '. Time: ' . $r['time'] . 's.';
        } else {
            $message = 'Lỗi!';
        }
        return response()->json(['data' => $message]);
    }
}
