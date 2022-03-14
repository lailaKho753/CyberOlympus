@extends('layouts.app')
@section('title', 'Cyber Olympus')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
		<div class="form-group">
			<button class="btn btn-info btn-small" id="btnAdd">Tambah Data</button>
		</div>
            <div class="card">
                <div class="card-header">Daftar Kontak</div>

                <div class="card-body">
                <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
                        <tr>
							<th>No</th>
							<th>ID</th>
                            <th>Nama</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat</th>
                        </tr>
					</thead>
					<tbody>                           
					</tbody>
				</table>
<!--Tambah Data-->
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form>
		  @csrf
  <div class="form-group">
    <label for="id">ID</label>
    <select class="form-control" id="id">
	<option value="">-Pilih-</option>
	@foreach($id as $id)
	<option value="{{$id->id}}">{{$id->id}}</option>
	@endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="phone">Nomor Telepon</label>
    <input type="text" class="form-control" id="phone">
  </div>
  <div class="form-group">
    <label for="address">Alamat</label>
    <input type="text" class="form-control" id="address">
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button id="btnSave" type="button" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
	
<script>
	$(document).ready(function()
	{
		tampildata();
	});

	$('#btnAdd').click(function(){
		$('.modal').modal('show');
	});

	$('#btnSave').click(function(){
		var id = $('#id').find(":selected").text();
		var phone = $('#phone').val();
		var address = $('#address').val();
		var token = $('input[name=_token]').val();

		$.ajax({
			url: '{{route("tambahdata")}}',
			type: 'POST',
			data: {
				id: id,
				phone: phone,
				address: address,
				_token: token
			},
			success: function(data){
				alert('Data berhasil disimpan');
				$('#id').val('');
				$('#phone').val('');
				$('#address').val('');
				$('.modal').modal('hide');
				tampildata();
			}
		});

	});
	function tampildata()
	{
		$('tbody').html('');
		$.ajax({
			url: "{{route('tampildata')}}",
			type: "GET",
			dataType:'json',
			success: function(data){
				$.each(data, function(key, values){
					id = data[key].id;
					name = data[key].name;
					phone = data[key].phone;
					address = data[key].address;
					$('tbody').append('<tr>\
					<td>'+parseInt(key+1)+'</td>\
					<td>'+id+'</td>\
					<td>'+name+'</td>\
					<td>'+phone+'</td>\
					<td>'+address+'</td>\
                    </tr>');	
				});
			}
		});
	}
</script>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection