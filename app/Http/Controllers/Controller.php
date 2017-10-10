<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function create(Request $req)
    {
    	echo $req->Pid;
    	echo $req->Pname;
    	echo $req->age;
    	echo $req->Sex;
    	echo $req->drugid;
    	echo $req->Quantity;
    	echo $req->txtbox[0];
    	echo "vg";
    	echo $req->txtbox[1];
    	echo "lk";
    	echo $req->txtbox[2];
    	echo "kk";
    }
}
