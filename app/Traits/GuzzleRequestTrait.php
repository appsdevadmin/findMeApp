<?php

namespace App\Traits;

use App\Library\Master;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;

trait GuzzleRequestTrait
{

    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function makeHttpRequest($method, $url, $header = null, $body = null, $body_type = 'form_params')
    {
        $this->client = new Client([
            'headers' => $header,
        ]);

        switch ($body_type) {
            case 'json':
                $client_body = ['json' => $body,];
                break;
            case 'body':
                $client_body = ['body' => $body,];
                break;
            default:
                $client_body = ['form_params' => $body,];
                break;
        }

        $response = null;

        if ($method === 'GET') {
            $response = $this->doGet($url);
        }
        if ($method === 'POST') {
            $response = $this->doPost($url, $client_body);
        }
        if ($method === 'MULTIPART') {
            $response = $this->doMultiPart($url, $body);
        }

        return $response;
    }

    public function doGet($url)
    {
        return $this->client->request('GET', $url);
    }

    public function doPost($url, $body)
    {
        return $this->client->request('POST', $url, $body);
    }

    public function doMultiPart($url, $body = [])
    {
        return $this->client->request('POST', $url, [
            'multipart' => $body
        ]);
    }
}
