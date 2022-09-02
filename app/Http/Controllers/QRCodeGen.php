<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use GuzzleHttp\Exception\GuzzleException;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\staff_data;

class QRCodeGen extends Controller
{
	public function generateQR()
    {		
			$logopath = '\public\img\x11.png';
			$all_staffx = staff_data::wherebetween('id', [6301,6873])->get();
				ini_set('max_execution_time', 0);
				foreach($all_staffx as $asx) {
					$qr_data = 'https://findme.nnpcgroup.com/'.$asx->unique_id;
					QrCode::size(300)->format('png')->style('square')->margin(3)
					->eye('square')->errorCorrection('H')->merge($logopath, .2)
					->generate($qr_data, public_path('QRCode/'.$asx->staff_id.'.png'));
				}
			return view('qrcode' ,compact('all_staffx'));
    }
	
}
