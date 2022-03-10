@extends('layouts.app')
@section('content')

<div class="container">

{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
        <center>
		<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
			IMPORT EXCEL
        </button>
        </center>
</br>

<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/karyawan/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Kontak</div>

                <div class="card-body">
                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Alamat Website</th>
                            <th>Aksi</th>
                        </tr>
					</thead>
					<tbody>             
                     @foreach ($post as $item)
                        <tr>
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> nama_company}}</td>
                            <td>{{$item -> email}}</td>
                            <td>{{$item -> logo}}</td>
                            <td>{{$item -> website}}</td>
                            <td>
                                <a href="/comp/{{$item->id}}/daftar" class="btn btn-sm btn-success">Detail</a>
                                <a href="/comp/{{$item->id}}/cetak_pdf" class="btn btn-primary">Cetak PDF</a>
                            </td>
                        @endforeach
                        </tr>
                        
					</tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection