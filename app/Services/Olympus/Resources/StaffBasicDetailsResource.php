<?php

namespace App\Services\Olympus\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StaffBasicDetailsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'staff_id' => $this['ID_NO'] ?? null,
            'surname' => $this['LAST_NAME'] ?? null,
            'firstname' => $this['FIRST_NAME'] ?? null,
            'middle_name' => $this['MIDDLE_NAME'] ?? null,
            'full_name' => ($this['FIRST_NAME'] ?? null).' '.($this['LAST_NAME'] ?? null),
            'grade' => $this['GRADE_CODE'] ?? null,
            'emailaddress' => $this['EMAIL'] ?? null,
            'sbu' => $this['SBU'] ?? null,
            'category' => $this['CATEGORY'] ?? null,
            'location' => $this['LOCATION'] ?? null,
            'department' => $this['DEPARTMENT_FULLNAME'] ?? null,
            'division_name' => $this['DIVISION_FULLNAME'] ?? null,
            'designation' => $this['DESIGNATION'] ?? '',
            'building' => $this['BUILDING'] ?? '',
            'phone' => $this['PHONE'] ?? '',
            'extension' => $this['EXT'] ?? '',
            'mobile' => $this['MOBILE'] ?? '',
            'office' => $this['OFFICE'] ?? '',
            'dob' => $this['DOB'] ?? '',
            'sex' => $this['SEX'] ?? '',
        ];
    }
}
