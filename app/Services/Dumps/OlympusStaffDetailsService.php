<?php


namespace App\Services\Dumps;


use App\Imports\EcmDumpImport;
use App\Models\EcmDump;
use App\Models\OlympusStaffDump;
use App\Services\Olympus\OlympusWebService;
use App\Services\ProfileService;
use App\Traits\ResponseTrait;
use App\Traits\UtilsTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;
use function activity;
use function info;
use function response;

class OlympusStaffDetailsService
{

    use ResponseTrait;

    public function __construct(protected OlympusWebService $olympusWebService)
    {}

    public function processRoutineOlympusStaffDetailsDump(): JsonResponse
    {
        set_time_limit(600);

        try {

            $all_staff = $this->olympusWebService->getBasicStaffDetails();
            //check if file is empty
            if (!$all_staff){
                return response()->json([
                    'status'=>false,
                    'message'=>'empty array'
                ]);
            }

            return DB::transaction(static function () use ($all_staff) {
                //clear table
                DB::table('olympus_staff_dump')->delete();
                //run through file
                foreach ($all_staff as $value)
                {
                    $olympus_staff = new OlympusStaffDump();
                    $olympus_staff->staff_id = $value['staff_id'];
                    $olympus_staff->last_name = $value['last_name'];
                    $olympus_staff->first_name = $value['first_name'];
                    $olympus_staff->middle_name = $value['middle_name'];
                    $olympus_staff->designation = $value['designation'];
                    $olympus_staff->sbu = $value['sbu'];
                    $olympus_staff->grade_level = $value['grade'];
                    $olympus_staff->division_code = $value['division_code'];
                    $olympus_staff->dept_code = $value['department_code'];
                    $olympus_staff->head_id = $value['dept_head_id'];
                    $olympus_staff->employment_type = $value['employment_type'];
                    $olympus_staff->save();
                }

                activity('OLYMPUS_DUMP')->log('OLYMPUS DUMP COMPLETED'); //Log;

                return response()->json([
                    'status'=>true,
                    'message'=>'OLYMPUS DUMP COMPLETED'
                ]);
            });

        }catch (Exception|Throwable $exception) {
            if(self::hasDebug()){
                //This section should be logged for debugging.
                $exceptionResponse = self::getExceptionResponse($exception);
                activity('OLYMPUS_DUMP')->log($exceptionResponse); //Log;
                return response()->json([
                    'status'=>false,
                    'message'=>'Exception. Please check the log'
                ]);
            }
        }
        return response()->json([
            'status'=>false,
            'message'=>'Try()..Catch() Failed'
        ]);
    }
}