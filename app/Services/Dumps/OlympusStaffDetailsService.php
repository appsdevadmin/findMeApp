<?php


namespace App\Services\Dumps;

use App\Models\OlympusStaffDump;
use App\Services\Olympus\OlympusWebService;
use App\Services\Olympus\Requests\GetBasicStaffDetailsRequest;
use App\Services\ProfileService;
use App\staff_data;
use App\Traits\ResponseTrait;
use App\Traits\UtilsTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;
use function activity;
use function info;
use function response;

class OlympusStaffDetailsService
{

    use ResponseTrait;
    public $basicStaffDetails;

    public function __construct()
    {
        $this->basicStaffDetails = new GetBasicStaffDetailsRequest();
    }

    public function processRoutineOlympusStaffDetailsDump(): JsonResponse
    {
        set_time_limit(600);

        try {

            $all_staff = (object)$this->basicStaffDetails->init();
            //check if file is empty
            if (!$all_staff){
                return response()->json([
                    'status'=>false,
                    'message'=>'empty array'
                ]);
            }

            return DB::transaction(static function () use ($all_staff) {
                //run through file
                foreach ($all_staff as $value)
                {
                    $staff_data = staff_data::query()
                        ->where('staff_id', $value->staff_id)
                        ->update([
                            'first_name' => $value->firstname,
                            'last_name' => $value->surname,
                            'middle_name' => $value->middle_name,
                            'sex' => $value->sex,
                            'dob' => $value->dob,
                            'grade_code' => $value->grade,
                            'designation' => $value->designation,
                            'phone' => $value->phone,
                            'mobile' => $value->mobile,
                            'office' => $value->office,
                            'ext' => $value->ext,
                            'email' => $value->emailaddress,
                            'loc_description' => $value->location,
                            'department_name' => $value->department,
                            'division_fullname' => $value->division_name,
                            'sbu' => $value->sbu,
                            'category' => $value->category,
                        ]);
                }

                Log::info('OLYMPUS DUMP COMPLETED'); //Log;

                return response()->json([
                    'status'=>true,
                    'message'=>'OLYMPUS DUMP COMPLETED'
                ]);
            });

        }catch (Exception|Throwable $exception) {
            if(self::hasDebug()){
                //This section should be logged for debugging.
                $exceptionResponse = self::getExceptionResponse($exception);
                Log::error($exceptionResponse); //Log;
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
