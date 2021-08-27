<?php

namespace App\Console\Commands;

use App\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImportStudent extends Command
{
    protected $signature = 'import-student {filename}';

    protected $description = 'Import student';

    public function __construct()
    {
        parent::__construct();
    }

    private function v1($filename)
    {
        $file = fopen($filename, "r");
        $lineNumber = 0;
        while (!feof($file)) {
            $line = fgetcsv($file);
            $lineNumber++;
            $student = [];
            print_r($line);
            for ($i = 0; $i < count(Student::MAP_FIELD); $i++) {
                switch (Student::MAP_FIELD[$i]) {
                    case 'gioi_tinh':
                        $student[Student::MAP_FIELD[$i]] = empty($line[$i + 1]) ? 'Nam' : 'Nu';
                        break;
                    case 'ngay_sinh':
                        $dateString = trim($line[$i + 1]);
                        $student[Student::MAP_FIELD[$i]] = empty($dateString) ? null : Carbon::createFromFormat('d/m/Y', $line[$i + 1]);
                        break;
                    case 'diem_uu_tien':
                    case 'diem_giai':
                    case 'diem_xet_tuyen':
                        $student[Student::MAP_FIELD[$i]] = empty($line[$i + 1]) ? 0 : $line[$i + 1];
                        break;
                    default:
                        $student[Student::MAP_FIELD[$i]] = $line[$i + 1];
                }
            }
            try {
                Student::create($student);
                $this->info("Line {$lineNumber}: OK");
            } catch (\Exception $exception) {
                $this->warn("Line {$lineNumber}: Error");
            }
        }
        fclose($file);
    }

    public function v2($filename)
    {
        $t = hrtime(true);
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filename);
        $highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
        $range = "A5:AU{$highestRow}";
        $dataArray = $spreadsheet->getActiveSheet()
            ->rangeToArray(
                $range,
                null,
                false,
                true,
                false
            );
        $result = [
            'time' => 0,
            'success' => 0,
            'error' => 0,
            'total' => 0,
        ];
        foreach ($dataArray as $lineNumber => $line) {
            $result['total']++;
            for ($i = 0; $i < count(Student::MAP_FIELD); $i++) {
                $dataLine = $line[$i] ?? '';
                switch (Student::MAP_FIELD[$i]) {
                    case 'stt':
                        break;
                    case 'gioi_tinh':
                        $student[Student::MAP_FIELD[$i]] = empty($dataLine) ? 'Nam' : 'Nu';
                        break;
                    case 'ngay_sinh':
                        $dateString = trim($dataLine);
                        $student[Student::MAP_FIELD[$i]] = empty($dateString) ? null : Carbon::createFromFormat('d/m/Y', $dataLine);
                        break;
                    case 'toan1':
                    case 'tv1':
                    case 'toan2':
                    case 'tv2':
                    case 'toan3':
                    case 'tv3':
                    case 'ta3':
                    case 'toan4':
                    case 'tv4':
                    case 'ta4':
                    case 'kh4':
                    case 'sd4':
                    case 'toan5':
                    case 'tv5':
                    case 'ta5':
                    case 'kh5':
                    case 'sd5':
                    case 'tong':
                    case 'diem_uu_tien':
                    case 'diem_giai':
                    case 'diem_xet_tuyen':
                        $student[Student::MAP_FIELD[$i]] = empty($dataLine) ? 0 : $dataLine;
                        break;
                    default:
                        $student[Student::MAP_FIELD[$i]] = $dataLine;
                }
            }
            $student['email'] = '';
            $student['ma_ho_so'] = '';
            try {
                Student::create($student);
                $result['success']++;
            } catch (\Exception $exception) {
                $result['error']++;
                Log::error($exception->getTraceAsString());
            }
        }
        $t2 = hrtime(true);

        $result['time'] = ($t2 - $t) / 1e+9;
        return $result;

    }

    public function handle()
    {
        DB::table('students')->delete();
        $filename = $this->argument('filename');
        $r = $this->v2($filename);
        $this->info("Total process: {$r['total']}");
        $this->info("Total success: {$r['success']}");
        $this->warn("Total error: {$r['error']}");
        $this->info("Time: {$r['time']}");
        return 0;
    }
}
