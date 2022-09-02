<?php

namespace App\Services\ActiveDirectory;

use Exception;

class ActiveDirectoryService
{
    // specify the LDAP server to connect to

    protected bool $response_status = false;

    protected string $response_message = 'Invalid access, please contact support.';

    protected array $response_data = [];

    private array $ldap_servers = ['10.0.48.5', '10.0.48.6'];

    private string $base_username = 'chq\\';

    public function connect($staff_id, $password): array
    {
        if ($staff_id && $password) {
            foreach ($this->ldap_servers as $ldap_server) {
                $ldap_connect = @ldap_connect($ldap_server);
                ldap_set_option($ldap_connect, LDAP_OPT_PROTOCOL_VERSION, 3);
                ldap_set_option($ldap_connect, LDAP_OPT_REFERRALS, 0);

                try {
                    // binding to ldap server
                    $ldap_bind = @ldap_bind($ldap_connect, $this->base_username.$staff_id, $password);

                    if (! $ldap_bind) {
                        $error_code = ldap_errno($ldap_connect);
                        $this->response_message = $this->getLDapErrorMessage($error_code);
                        ldap_unbind($ldap_connect);
                        break;
                    }

                    // verify binding
                    $distinguished_name = 'dc=chq,dc=nnpcgroup,dc=local';
                    $attributes = ['samaccountname', 'sn', 'givenname', 'telephonenumber', 'physicaldeliveryofficename', 'mail'];
                    // create the search string
                    $ldap_querystring = "(&(objectcategory=user)(samaccountname=$staff_id))";
                    // start searching	// specify both the start location and the search criteria	// in this case, start at the top and return all entries
                    $ldap_search = ldap_search($ldap_connect, $distinguished_name, $ldap_querystring, $attributes); //or die ("Error in searching ".$this->var_status." details");

                    if (! $ldap_search) {
                        ldap_unbind($ldap_connect);
                        continue;
                    }

                    // get entry data as array
                    $ldap_entries = ldap_get_entries($ldap_connect, $ldap_search);
                    // iterate over array and print data for each entry
                    for ($i = 0; $i < $ldap_entries['count']; $i++) {
                        if ($ldap_entries[$i]['samaccountname'][0]) {
                            $this->response_status = true;
                            $this->response_message = 'Login Successful';
                            $this->response_data = [
                                'staff_id' => $ldap_entries[$i]['samaccountname'][0],
                                'first_name' => $ldap_entries[$i]['givenname'][0],
                                'last_name' => $ldap_entries[$i]['sn'][0],
                                'email_address' => $ldap_entries[$i]['mail'][0],
                            ];
                        }
                    }
                } catch (Exception $ex) {
                    ldap_unbind($ldap_connect);
                    continue;
                }
                ldap_unbind($ldap_connect);
                break;
            }
        }

        return [
            'status' => $this->response_status,
            'message' => $this->response_message,
            'data' => $this->response_data,
        ];
    }

    public function connectTestMode($staff_id, $password): array
    {
        if ($staff_id && $password) {
            $this->response_status = true;
            $this->response_message = 'Login Successful';
            $this->response_data = [
                'staff_id' => $staff_id,
                'first_name' => 'Test',
                'last_name' => 'Test',
                'email_address' => 'test@test.com',
            ];
        }

        return [
            'status' => $this->response_status,
            'message' => $this->response_message,
            'data' => $this->response_data,
        ];
    }

    private function getLDapErrorMessage($code): string
    {
        if ($code === 49) {
            return 'Invalid Credentials. Please check Username and Password then try again later!';
        }

        return 'Network Failure. Please check your connection and contact support if the issue persist.';
    }
}
