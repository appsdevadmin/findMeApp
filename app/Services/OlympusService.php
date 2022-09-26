<?php


namespace App\Services;

class OlympusService
{
    protected $client;
    protected $base_url;
    protected $service_url;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
        $this->base_url = 'http://10.0.48.74:777/Servicenew.asmx/';
    }

    protected function parseXMLResponse ($response) {
        return new \SimpleXMLElement($response->getBody()->getContents());
    }

    private function baseApiCall(){
        try {
            return $this->parseXMLResponse($this->client->request('GET', $this->service_url));
        }catch (\Exception $exception){
            throw new \RuntimeException('Unable to process request. Please ensure VPN Connection is active. ');
        }
    }

    private function getApiResponse(){
        $xml_children = $this->baseApiCall()->children('diffgr', true);
        $diffgr_children = $xml_children->children();
        return $diffgr_children->NewDataSet->Table;
    }

    private function setServiceURL($service_name, $params = null){
        $params = ($params)? '?'.http_build_query($params) : '';
        $service_query = $service_name.$params;
        $this->service_url = $this->base_url.$service_query;
        return $this;
    }

    public function isStaffInactive($staff_id){
        $service_name = 'IsStaffInactive';
        $params = [
            'staffID'=>$staff_id,
        ];
        return $this->setServiceURL($service_name, $params)->baseApiCall(); //return true or false
    }

    public function hasUpdatedProfile($staff_id){
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
        return $this->setServiceURL($service_name, $params)->getApiResponse();
    }

    public function getActiveStaffByID($staff_id)
    {
        $service_name = 'GetStaffDetails';
        $params = [
            'staffID'=>$staff_id,
        ];
        return $this->setServiceURL($service_name, $params)->getApiResponse();
    }

    public function getStaffByName($staff_name)
    {
        $service_name = 'getStaffByName';
        $params = [
            'strName'=>$staff_name,
        ];
        return $this->setServiceURL($service_name, $params)->getApiResponse();
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
        return $this->setServiceURL($service_name, $params)->getApiResponse();
    }

    public function getDepartments()
    {
        $service_name = 'GetDepartments';
        $params = [];
        return $this->setServiceURL($service_name, $params)->getApiResponse();
    }

    public function getDivisions()
    {
        $service_name = 'GetDivisions';
        $params = [];
        return $this->setServiceURL($service_name, $params)->getApiResponse();
    }

    public function getStaffDetailsByNameDeptDiv($staff_id, $first_name, $last_name, $dept_code, $div_code)
    {
        $service_name = 'GetStaffDetailsByNameDeptDiv';
        $params = [
            'staffID'=>$staff_id,
            'firstName'=>$first_name ?? '',
            'lastName'=> $last_name,
            'deptCode'=>$dept_code,
            'divCode'=> $div_code,
        ];
        return $this->setServiceURL($service_name, $params)->getApiResponse();
    }
}