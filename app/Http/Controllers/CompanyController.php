<?php
 
namespace App\Http\Controllers;

use App\Company;
use App\Karyawan;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CompanyController extends Controller
{
    public function index($id)
    {
        $company = Company::find($id);
        return view('comp.daftar',['company' => $company]);
    }

    public function hapus($id)
    {
        Karyawan::where('karyawan_id', $id)->delete();
        return redirect('home');
    }
    public function cetak_pdf($id)
    {
    	$company = Company::find($id);
    	$pdf = PDF::loadview('pegawai_pdf',['company'=>$company]);
    	return $pdf->download('laporan-pegawai.pdf');
    }
}