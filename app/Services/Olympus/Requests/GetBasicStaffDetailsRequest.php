<?php

namespace App\Services\Olympus\Requests;

use App\Services\Olympus\Resources\StaffBasicDetailsResource;

class GetBasicStaffDetailsRequest extends Request
{
    protected string $path = 'GetBasicStaffDetails';

    public function init($staff_id = ""): array
    {
        $params = [
            'staffID' => $staff_id,
        ];
        $staff = $this->setServiceURL($this->path, $params)->getApiResponse()['Table'] ?? [];
        if (! $staff) {
            return [];
        }
        if (isset($staff[0])){
            return StaffBasicDetailsResource::collection($staff)->resolve();
        }
        return (new StaffBasicDetailsResource($staff))->resolve();
    }
}
