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
            'location' => ucwords(strtolower($this['LOCATION'] ?? null)),
            'department' => ucwords(strtolower($this['DEPARTMENT_FULLNAME'] ?? null)),
            'department_code' => $this['DEPT_CODE'] ?? null,
            'division_name' => ucwords(strtolower($this['DIVISION_FULLNAME'] ?? null)),
            'designation' => $this['DESIGNATION'] ?? '',
            'building' => $this['BUILDING'] ?? '',
            'extension' => $this['MOBILE'] ?? '',
        ];
    }
}
