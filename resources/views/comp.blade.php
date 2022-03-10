@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Karyawan</div>

                <div class="card-body">
                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
					</thead>
					<tbody>
                    @if ($data->count() == 0)
                        <tr>
                        <td colspan="5">No products to display.</td>
                        </tr>
                    @endif      
                     @foreach ($comp->karyawan as $karyawan)
                        <tr>
                            <td>{{$karyawan -> id}}</td>
                            <td>{{$karyawan -> nama}}</td>
                            <td>{{$karyawan -> email_k}}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Edit</a>
                                <a href="" class="btn btn-sm btn-danger">Hapus</a>
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