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
    	// $dermagas = DB::table('m_dermaga')->pluck('nama_dermaga','kode_dermaga');
    	// DB::table('m_dermaga')->where('jenis_perairan','DALEM')
    	// 	->chunkById(100, function($dermagas){
    	// 		foreach($dermagas as $dermaga){
    	// 			DB::table('m_dermaga')
    	// 				->where('jenis_perairan','DALEM')
    	// 				->update(['jenis_perairan' => 'NAMABARU']);
    	// 		}
    	// });
    	// $jumlahRecord = DB::table('m_dermaga')->count();
    	// echo $jumlahRecord;
    	// $terpanjang = DB::table('m_dermaga')->max('panjang');
    	// echo $terpanjang;
    	$query = DB::table('m_dermaga')->select('kode_pelabuhan');

    	$dermagas = $query->addSelect('nama_pelabuhan')->get();
    	echo "<pre>";
    	print_r($dermagas);
    	echo "</pre>";
    	die();
    }	
}
