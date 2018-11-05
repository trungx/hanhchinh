<?php

namespace HanhChinh\HanhChinh\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HanhChinh;

class HanhChinhController extends Controller
{
    //
    public function index(){
    	
    	$hcs = HanhChinh::all();

    	file_put_contents(public_path().'/hanhchinh.json', json_encode($hcs, JSON_PRETTY_PRINT));

    	
    }
}
