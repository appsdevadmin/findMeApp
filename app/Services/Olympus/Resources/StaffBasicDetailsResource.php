<?php

namespace App\Services\Olympus\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StaffBasicDetailsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'staff_id' => $this['ID_NO'] ?? null,
            'surname' => ucwords(strtolower($this['LAST_NAME'] ?? null)),
            'firstname' => ucwords(strtolower($this['FIRST_NAME'] ?? null)),
            'middle_name' => ucwords(strtolower($this['MIDDLE_NAME'] ?? null)),
            'full_name' => ucwords(strtolower(($this['FIRST_NAME'] ?? null).' '.($this['LAST_NAME'] ?? null))),
            'grade' => $this['GRADE_CODE'] ?? null,
            'emailaddress' => $this['EMAIL'] ?? null,
            'sbu' => $this['SBU'] ?? null,
            'category' => $this['CATEGORY'] ?? null,
            'location' => ucwords(strtolower($this['LOCATION'] ?? null)),
            'department' => ucwords(strtolower($this['DEPARTMENT_FULLNAME'] ?? null)),
            //'department_code' => $this['DEPT_CODE'] ?? null,
            'division_name' => ucwords(strtolower($this['DIVISION_FULLNAME'] ?? null)),
            'designation' => ucwords(strtolower($this['DESIGNATION'] ?? '')),
            'building' => ucwords(strtolower($this['BUILDING'] ?? '')),
            'phone' => $this['PHONE'] ?? '',
            'extension' => $this['EXT'] ?? '',
            'mobile' => $this['MOBILE'] ?? '',
            'office' => $this['OFFICE'] ?? '',
            'dob' => $this['DOB'] ?? '',
            'sex' => ucwords(strtolower($this['SEX'] ?? '')),
        ];
    }
}
