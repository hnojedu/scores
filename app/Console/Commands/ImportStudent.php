<?php

namespace App\Console\Commands;

use App\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use PHPUnit\Framework\ExpectationFailedException;

class ImportStudent extends Command
{
    protected $signature = 'import-student {filename}';

    protected $description = 'Import student';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        DB::table('students')->delete();
        $filename = $this->argument('filename');
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
        return 0;
    }
}
