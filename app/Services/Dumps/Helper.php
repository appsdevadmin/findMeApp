<?php

namespace App\Services\Dumps;

use Exception;
use Illuminate\Support\Facades\Storage;

trait Helper
{

    private function getDumpFromFtp($file_folder, $file_name): bool
    {
        ini_set('memory_limit', '256M');

        try {
            $ftp = Storage::createFtpDriver([
                'host'      => config('services.chq_webhost.host'),
                'username'  => config('services.chq_webhost.username'),
                'password'  => config('services.chq_webhost.password'),
            ]);
            $file_path       = $file_folder.'/'.$file_name;

            $server_file_modified_time = $ftp->lastModified($file_path);
            $local_file_modified_time = (Storage::disk('local')->exists($file_name))?
                Storage::lastModified($file_name) : 0;

            if($server_file_modified_time < $local_file_modified_time){
                return false;
            }

            $file_content    = $ftp->get($file_path);
            Storage::disk('local')->put($file_name, $file_content);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
