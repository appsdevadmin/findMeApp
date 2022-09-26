<?php

namespace App\Services\Olympus;
use GuzzleHttp\Exception\GuzzleException;
use SimpleXMLElement;
use Exception;
use RuntimeException;

Class Helper
{
    protected $client;
    protected $base_url;
    protected $service_url;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
        $this->base_url = 'http://10.0.48.74:777/Servicenew.asmx/';
    }

    protected function baseApiCall(): SimpleXMLElement
    {
        try {
            return $this->parseXMLResponse($this->client->request('GET', $this->service_url));
        }catch (Exception|GuzzleException $exception){
            throw new RuntimeException('Unable to process request. Please ensure VPN Connection is active or contact support. ');
        }
    }

    protected function getApiResponse(): array
    {
        $xml_children = $this->baseApiCall()->children('diffgr', true);
        $diffgr_children = $xml_children->children();
        return $this->simpleXmlToArray($diffgr_children->NewDataSet);
    }

    protected function setApiResponse(): array
    {
        $xml_children = $this->baseApiCall()->children('diffgr', true);
        $diffgr_children = $xml_children->children();
        return $this->simpleXmlToArray($diffgr_children->NewDataSet);
    }

    protected function setServiceURL($service_name, $params = null): Helper
    {
        $params = ($params)? '?'.http_build_query($params) : '';
        $service_query = $service_name.$params;
        $this->service_url = $this->base_url.$service_query;
        return $this;
    }

    /**
     * @throws Exception
     */
    private function parseXMLResponse ($response): SimpleXMLElement
    {
        return new SimpleXMLElement($response->getBody()->getContents());
    }

    private function simpleXmlToArray($xml): array
    {
        $ar = array();
        foreach ($xml->children() as $k => $v) {
            $child = self::simplexmlToArray($v);
            if (count($child) === 0) {
                $child = (string) $v;
            }
            foreach ($v->attributes() as $ak => $av) {
                if (!is_array($child)) {
                    $child = array("value" => $child);
                }
                $child[$ak] = (string) $av;
            }
            if (!array_key_exists($k, $ar)) {
                $ar[$k] = $child;
            } else if (!is_string($ar[$k]) && isset($ar[$k][0])) {
                $ar[$k][] = $child;
            } else {
                $ar[$k] = array($ar[$k]);
                $ar[$k][] = $child;
            }
        }
        return $ar;
    }
}
