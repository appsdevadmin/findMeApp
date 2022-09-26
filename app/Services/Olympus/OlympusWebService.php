<?php


namespace App\Services\Olympus;
use App\Http\Resources\Olympus\StaffResource;
use SimpleXMLElement;

class OlympusWebService extends Helper
{
    public function isStaffInactive($staff_id): SimpleXMLElement
    {
        $service_name = 'IsStaffInactive';
        $params = [
            'staffID'=>$staff_id,
        ];
        return $this->setServiceURL($service_name, $params)->baseApiCall(); //return true or false
    }

    public function hasUpdatedProfile($staff_id): SimpleXMLElement
    {
        $service_name = 'hasUpdatedProfile';
        $params = [
            'staffID'=>$staff_id,
        ];
        return $this->setServiceURL($service_name, $params)->baseApiCall(); //return true or false
    }

    public function getInActiveStaffByID($staff_id)
    {
        $service_name = 'GetInActiveStaffDetails';
        $params = [
            'staffID'=>$staff_id,
        ];
        return $this->setServiceURL($service_name, $params)->getApiResponse()['Table'];
    }

    public function getActiveStaffByID($staff_id)
    {
        $service_name = 'GetStaffDetails';
        $params = [
            'staffID'=>$staff_id,
        ];
        return $this->setServiceURL($service_name, $params)->getApiResponse()['Table'];
    }

    public function getBasicStaffDetailsByID($staff_id)
    {
        $service_name = 'GetBasicStaffDetails';
        $params = [
            'staffID'=>$staff_id,
        ];
        return $this->setServiceURL($service_name, $params)->getApiResponse()['Table'];
    }

    public function getStaffByEmail($email)
    {
        $service_name = 'GetStaffDetailsByEmail';
        $params = [
            'email'=>$email,
        ];
        return $this->setServiceURL($service_name, $params)->getApiResponse()['Table'];
    }

    public function getStaffByName($staff_name)
    {
        $service_name = 'getStaffByName';
        $params = [
            'strName'=>$staff_name,
        ];
        return $this->setServiceURL($service_name, $params)->getApiResponse()['Table'];
    }


    public function getStaffByID($staff_id)
    {
        return $this->isStaffInactive($staff_id) == "false" ?
            $this->getActiveStaffByID($staff_id) : $this->getInActiveStaffByID($staff_id);
    }

    public function getStaffSBU($staff_id)
    {
        $service_name = 'GetStaffSBU';
        $params = [
            'staffID'=>$staff_id,
        ];
        return $this->setServiceURL($service_name, $params)->getApiResponse()['Table'];
    }

    public function getRetiringStaff($period)
    {
        $service_name = 'GetRetiringStaff';
        $params = [
            'period'=>$period,
        ];
        return $this->setServiceURL($service_name, $params)->getApiResponse()['Table'];
    }

    public function getRetiringStaffSignatories()
    {
        $service_name = 'GetRetiringStaffSignatories';
        return $this->setServiceURL($service_name)->getApiResponse()['Table'];
    }

    public function setRetireeToSent($staff_id, $sent_val, $signatory_id, $signatory_name, $signatory_desig): SimpleXMLElement
    {
        $service_name = 'SetRetSent';
        $params = [
            'staffID'=>$staff_id,
            'sentVal'=>$sent_val,
            'signatoryID'=>$signatory_id,
            'signatoryName'=>$signatory_name,
            'signatoryDesig'=>$signatory_desig,
        ];
        return $this->setServiceURL($service_name, $params)->baseApiCall(); //return true or false

    }

    public function getStaffDetailsByNameDeptDiv($staff_id, $first_name, $last_name, $dept_code, $div_code)
    {
        $service_name = 'GetStaffDetailsByNameDeptDiv';
        $params = [
            'staffID'=>$staff_id,
            'firstName'=>$first_name,
            'lastName'=> $last_name,
            'deptCode'=>$dept_code,
            'divCode'=> $div_code,
        ];
        return $this->setServiceURL($service_name, $params)->getApiResponse()['Table'];
    }

    public function getDepartments(): array
    {
        $service_name = 'GetDepartments';
        return $this->setServiceURL($service_name)->getApiResponse()['Table'];
    }

    public function getDivisions(): array
    {
        $service_name = 'GetDivisions';
        return $this->setServiceURL($service_name)->getApiResponse()['Table'];
    }

    public function getBasicStaffDetails($staff_id = ""): array
    {
        $service_name = 'GetBasicStaffDetails';
        $params = [
            'staffID'=>$staff_id,
        ];

        $response = $this->setServiceURL($service_name, $params)->getApiResponse()['Table'] ?? [];

        if($response === []){
            return [];
        }
        if (isset($response[0])){
            return StaffResource::collection($response)->resolve();
        }
        return [(new StaffResource($response))->resolve()];
    }
}
