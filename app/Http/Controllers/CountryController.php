<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use PDF;

class CountryController extends Controller
{
    public function index(){
    	$country = Country::take(20)->get();
    	return view('country', compact('country'));
    }

    public function print_pdf(){
    	$country = Country::take(20)->get();

    	$pdf = PDF::loadview('country_pdf',compact('country'));

    	return $pdf->stream('country-report-pdf');
    	// return $pdf->download('country-report-pdf');
    }
}
