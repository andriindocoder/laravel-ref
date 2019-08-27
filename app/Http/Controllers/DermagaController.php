<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dermaga;
use Illuminate\Support\Facades\DB;

class DermagaController extends Controller
{
    public function index(){
    	// $dermagas = DB::table('m_dermaga')->get();
    	// $dermaga = DB::table('m_dermaga')->where('kode_pelabuhan','IDJKT')->first();
    	// $dermaga = DB::table('m_dermaga')->where('kode_pelabuhan','IDJKT')->value('nama_pelabuhan');
    	$dermagas = DB::table('m_dermaga')->pluck('nama_dermaga','kode_dermaga');
    	echo "<pre>";
    	print_r($dermagas);
    	echo "</pre>";
    	die();
    }	
}
