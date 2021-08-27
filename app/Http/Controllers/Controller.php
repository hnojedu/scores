<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function search(Request $request)
    {
        $student = Student::where('ho_ten', $request->input('fullname'))
            ->where('dien_thoai', $request->input('phone'))
            ->first();
        if (empty($student)) {
            return response()->json(null, 404);
        }
        return response()->json(['data' => $student], 200);
    }
}
