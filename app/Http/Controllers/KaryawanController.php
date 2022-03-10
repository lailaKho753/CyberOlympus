<?php
namespace App\Http\Controllers;

use App\Karyawan;
use Session;
use App\Imports\KaryawanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
	{
		$karyawan = Karyawan::all();
		return view('home',['karyawan'=>$karyawan]);
	}
 
	public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_karyawan',$nama_file);
 
		// import data
		Excel::import(new KaryawanImport, public_path('/file_karyawan/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Karyawan Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('home');
	}
}
