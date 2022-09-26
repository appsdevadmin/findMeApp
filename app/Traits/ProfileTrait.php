<?php

namespace App\Traits;

use App\Services\Olympus\OlympusWebService;
use Carbon\Carbon;

trait ProfileTrait
{
    public static function getStaffByIDOld($staff_id): object
    {
        //Get Data from Olympus
        $olympus_service = new OlympusWebService();
        $logger_profile = $olympus_service->getStaffByID($staff_id);
        $staff_sbu = $olympus_service->getStaffSBU($staff_id)['SBU_NAME'];

        return (object)[
            'staff_id' => $staff_id,
            'full_name' => explode(" ", $logger_profile['OTHER_NAMES'])[0].' '.$logger_profile['SURNAME'],
            'last_name' => (string)$logger_profile['SURNAME'],
            'first_name' => explode(" ", $logger_profile['OTHER_NAMES'])[0], //Get the first part of the names (first & middle)
            'middle_name' => explode(" ", $logger_profile['OTHER_NAMES'])[1] ?: "", //Get the second part else return null
            'sbu_csu' => (string)$logger_profile['DIRECTORATE'],
            'division' => (string)$logger_profile['DIVISION'],
            'department' => (string)$logger_profile['DEPARTMENT'],
            'phone' => (string)$logger_profile['PHONE'],
            'email_address' => (string)$logger_profile['EMAIL'],
            'office' => (string)$logger_profile['OFFICE'],
            'location' => (string)$logger_profile['LOCATION'],
            'designation' => (string)$logger_profile['DESIGNATION'],
            'grade'=> (string)$logger_profile['GRADE'],
            'sbu' => (string)$staff_sbu
        ];
    }

    public static function getStaffByID($staff_id): object
    {
        //Get Data from Olympus
        $olympus_service = new OlympusWebService();
        $logger_profile = $olympus_service->getBasicStaffDetailsByID($staff_id);

        return (object)[
            'staff_id' => $logger_profile['ID_NO'],
            'full_name' => $logger_profile['FIRST_NAME'].' '.$logger_profile['LAST_NAME'],
            'last_name' => $logger_profile['LAST_NAME'],
            'first_name' => $logger_profile['FIRST_NAME'],
            'middle_name' => $logger_profile['MIDDLE_NAME'],
            'sbu_csu' => $logger_profile['SBU'],
            'location' => $logger_profile['LOCATION'],
            'department' => $logger_profile['DEPARTMENT_FULLNAME'],
            'division' => $logger_profile['DIVISION_FULLNAME'],

            'gender' => $logger_profile['SEX'],
            'age' => Carbon::parse($logger_profile['DOB'])->age,
            'phone' => $logger_profile['MOBILE'],
            'email_address' => $logger_profile['EMAIL'],
            'office' => '',
            'designation' => $logger_profile['DESIGNATION'],
            'grade'=> $logger_profile['GRADE_CODE'],
            'sbu' => $logger_profile['SBU'],
        ];
    }
}
