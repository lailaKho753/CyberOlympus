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
                    @php $no = 1; @endphp           
                    @foreach ($company->karyawan as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$row -> nama}}</td>
                            <td>{{$row -> email_k}}</td>
                            <td>
                                <a href="{{ route('post.delete',$row->karyawan_id) }}" class="btn btn-sm btn-danger">Hapus</a>
                            </td>                      
                        </tr>
                    @endforeach
                       
					</tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection