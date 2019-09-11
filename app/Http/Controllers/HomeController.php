<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class HomeController extends Controller
{
    // public $url = 'https://inaportnet.dephub.go.id/inaportnet-service-p1?wsdl';
    public $url = 'https://inaportdev.dephub.go.id/inaportnet-service-v2?wsdl';
    public $user = 'admin-op-idjkt';
    public $password = 'demodemo';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test(){
        $client = new SoapClient($this->url);
        $kade = 'IDJKT';
        $req = $client->__call('entryRpkro', [
                [
                    'user' => $this->user,
                    'password' => $this->password,
                    'NomorRpkRo' => '12345TEST4',
                    'KodeDermaga' => 'A1.B22',
                    'TanggalRencana' => '2019-09-10',
                    'JamRencana' => '15:15',
                    'NomorPkk' => '12345PKKTEST4',
                    'NomorPPKB' => '12345PPKBTEST',
                    'NomorRkbmMuat' => '12345RKBMUATTEST',
                    'NomorRkbmBongkar' => '12345RKBBONGKARTEST',
                    'KegiatanBongkar' => 'B',
                    'KegiatanMuat' => 'M',
                    'Komoditi' => 'KMD43',
                    'NomorGudang' => 'GD01',
                    'Keterangan' => '',
                    'TanggalMulaiTambat' => '2019-09-10',
                    'JamMulaiTambat' => '15:30',
                    'TanggalSelesaiTambat' => '2019-09-11',
                    'JamSelesaiTambat' => '15:30',
                    'KadeMeterAwal' => '0',
                    'KadeMeterAkhir' => '20',
                    'rpkroDetail' => ''
                ]
            ]
        );

        echo "<pre>";
        print_r($req);
        echo "</pre>";
        die();

        return json_encode($req->entryRpkroResult);
    }

    // public $url = 'http://localhost/work/inaportnet-kapal/ipn/frontend/web/inaportnet-service';
    

    protected function validasiInputEntryRpkro($request){
        $this->validate($request,[
            'nomor_rpkro'     => 'required',
            'kode_dermaga'    => 'required',
            'tanggal_rencana' => 'required',
            'jam_rencana'     => 'required',
            'nomor_ppkb'    => 'required',
        ]);
    }

    protected function WSentryRpkro($request){
        $client = new SoapClient($this->url);
        $kade = $request->get('kode_dermaga');
        $req = $client->__call('entryRpkro', [
                [
                    'user' => $this->user,
                    'password' => $this->password,
                    'NomorRpkRo' => $request['nomor_rpkro'],
                    'KodeDermaga' => $kade['kode_dermaga'],
                    'TanggalRencana' => $request['tanggal_rencana'],
                    'JamRencana' => $request['jam_rencana'],
                ]
            ]
        );

        return json_encode($req->entryRpkroResult);
    }
}
