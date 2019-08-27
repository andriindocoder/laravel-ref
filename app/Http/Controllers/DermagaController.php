<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dermaga;
use Illuminate\Support\Facades\DB;

class DermagaController extends Controller
{
    public function index(){
    	$dermagas = DB::table('m_dermaga')->get();
    	echo "<pre>";
    	print_r($dermagas);
    	echo "</pre>";
    	die();
    }	
}
