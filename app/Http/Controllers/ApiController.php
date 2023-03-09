<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    //

    public function abv_plass(Request $request){
        $data = Http::post('http://103.159.218.154:5050/api/status', [
            'api_secret_key' =>  $request->api_secret_key,
	        'cas_vendor' => $request->cas_vendor,
	        'cas_version' => $request->version
        ])->json();

        DB::table('api_cas_status')->insert(
            array(
                'api_secret_key'   =>  $request->api_secret_key,
                'cas_vendor'   =>   $request->cas_vendor,
                'cas_version'   =>   $request->cas_version,
            )
        );
    }
}
