<?php

namespace App\Traits;

use App\Models\SystemPreference;
use App\Services\Olympus\OlympusWebService;
use App\Services\OlympusService;
use olympuswrapper;
use adwrapper;

include(app_path() . "/lib/adwrapper.php");
include(app_path() . "/lib/olympuswrapper.php");

trait UtilsTrait
{

    public static function uploadDocument($document, $folder_name, $doc_name)
    {
        $destinationPath = 'public/'.$folder_name;
        $extension = $document->getClientOriginalExtension();
        $fileName = $doc_name.'_'.time().'.'.$extension;
        $document->storeAs($destinationPath, $fileName);
        return $fileName;
    }

    public static function getSystemPrefValue($key)
    {
        return SystemPreference::where('key',$key)->first()->value;
    }

    public static function getStaffDetails($staff_id, $password){

        //Check if exists in AD
        $staff_ad = new adwrapper($staff_id, $password, 'logger', $staff_id);
        //Check if Active Directory (AD) is null
        if (!($staff_ad != null && strlen($staff_ad->staffid_in_oracle) > 0)) {
//            Session::flash('message', 'Login Failed: Incorrect Username or Password!');
            return (object)['status'=>false, 'meta'=>"NOT_IN_ACTIVE_DIRECTORY", 'message'=>'Invalid Login Access. Please check Username/Password or try again later!', 'data'=>null];
        }

        return self::getStaffDetailsByID($staff_id);
    }

    public static function getStaffDetailsByID($staff_id){

        //Get Data from Olympus
        $olympus_service = new OlympusWebService();
        $logger_profile = $olympus_service->getStaffByID($staff_id);
        $staff_sbu = $olympus_service->getStaffSBU($staff_id)->SBU_NAME;

        $olympus_data_exist = $logger_profile? true:false;

        return (object)[
            'status'=>true,
            'olympus_data_exist'=>$olympus_data_exist,
            'meta' => "",
            'message' => "success",
            'data'=> (object)[
                'staff_id' => $staff_id,
                'full_name' => explode(" ", $logger_profile->OTHER_NAMES)[0].' '.$logger_profile->SURNAME,
                'last_name' => (string)$logger_profile->SURNAME,
                'first_name' => explode(" ", $logger_profile->OTHER_NAMES)[0], //Get the first part of the names (first & middle)
                'middle_name' => explode(" ", $logger_profile->OTHER_NAMES)[1] ?: "", //Get the second part else return null
                'sbu_csu' => (string)$logger_profile->DIRECTORATE,
                'division' => (string)$logger_profile->DIVISION,
                'department' => (string)$logger_profile->DEPARTMENT,
                'phone' => (string)$logger_profile->PHONE,
                'email_address' => (string)$logger_profile->EMAIL,
                'office' => (string)$logger_profile->OFFICE,
                'location' => (string)$logger_profile->LOCATION,
                'designation' => (string)$logger_profile->DESIGNATION,
                'grade'=> (string)$logger_profile->GRADE,
                'sbu' => (string)$staff_sbu
            ]
        ];
    }

    public static function getStaffDetailsByName($staff_name){

        //Get Data from Olympus
        $olympus_service = new OlympusService();
        $logger_profile = $olympus_service->getStaffByName($staff_name);
        $staff_sbu = $olympus_service->getStaffSBU((string)$logger_profile->ID_NO)->SBU_NAME;

        $olympus_data_exist = $logger_profile? true:false;

        return (object)[
            'status'=>true,
            'olympus_data_exist'=>$olympus_data_exist,
            'meta' => "",
            'message' => "success",
            'data'=> (object)[
                'staff_id' => (string)$logger_profile->ID_NO,
                'full_name' => explode(" ", $logger_profile->OTHER_NAMES)[0].' '.$logger_profile->SURNAME,
                'last_name' => (string)$logger_profile->SURNAME,
                'first_name' => explode(" ", $logger_profile->OTHER_NAMES)[0], //Get the first part of the names (first & middle)
                'middle_name' => explode(" ", $logger_profile->OTHER_NAMES)[1] ?: "", //Get the second part else return null
                'sbu_csu' => (string)$logger_profile->DIRECTORATE,
                'division' => (string)$logger_profile->DIVISION,
                'department' => (string)$logger_profile->DEPARTMENT,
                'phone' => (string)$logger_profile->PHONE,
                'email_address' => (string)$logger_profile->EMAIL,
                'office' => (string)$logger_profile->OFFICE,
                'location' => (string)$logger_profile->LOCATION,
                'designation' => (string)$logger_profile->DESIGNATION,
                'grade'=> (string)$logger_profile->GRADE,
                'sbu' => (string)$staff_sbu
            ]
        ];
    }
}
