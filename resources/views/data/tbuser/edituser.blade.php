@if(Session::has('nama'))
@else
<script type="text/javascript">
    window.location.href = '/login';
</script>
@endif

<h1 class="h3 mb-5 text-gray-800">Insert Admin</h1>

<form method="POST" action="{{url('/data/updateuser', $data[0]->kode_user)}}" class="form-data" id="form-data">  
    @csrf
    @method('PUT')
	<input type="hidden" id="id" name="">
	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				<label>Kode User</label>
				<input type="text" name="kodeuser" class="form-control" required value="{{$data[0]->kode_user}}" readonly>
			</div>
		</div>

        <div class="col-sm-3">
        	<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama" class="form-control" required value="{{$data[0]->nama}}">
			</div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label>Ket</label><br>
                <select class="form-control" name="ket" required>
					<option value="Guru" {{$data[0]->ket == 'Guru' ? 'selected' : ''}}>Guru</option>
					<option value="Murid" {{$data[0]->ket == 'Murid' ? 'selected' : ''}}>Murid</option>
				</select>
            </div>
        </div>
	</div>
	
	<div class="form-group" style="display: flex;">
		<button name="simpan" id="simpan" class="btn btn-primary" style="margin-right: 1%">
			<i class="fa fa-edit"></i> Edit
		</button>
	</div>
</form>

