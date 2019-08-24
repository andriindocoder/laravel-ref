<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use PDF;
use DB;

class CountryController extends Controller
{
    public function index(){
    	// $country = Country::take(20)->get();
        $country = Country::paginate(25);
    	return view('country',compact('country'));
    }

    public function print_pdf(){
    	$country = Country::take(20)->get();
 
    	$pdf = PDF::loadview('country_pdf',compact('country'));
    	return $pdf->stream('country-report-pdf');
    	// return $pdf->download('country-report-pdf');
    }

    public function search(Request $request){
        $search = $request->get('search');
        $country = Country::where('HeadOfState','like', '%' .$search. '%')
                    ->orWhere('name','like', '%' .$search. '%')
                    ->paginate(25);

        return view('country', ['country'=>$country]);
    }
}
