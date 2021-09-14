@if(Session::has('nama'))
@else
<script type="text/javascript">
    window.location.href = '/login';
</script>
@endif

<h1 class="h3 mb-5 text-gray-800">Insert Admin</h1>

<form method="POST" action="{{url('/data/updateadm', $data[0]->kode_user)}}" class="form-data" id="form-data">  
    @csrf
    @method('PUT')
	<input type="hidden" name="kode_session" value="{{Session::get('kode_user')}}">
	<input type="hidden" name="nama_session" value="{{Session::get('nama')}}">

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
                <label>Password</label><br>
                <input type="text" name="pass" class="form-control" required value="{{$data[0]->pass}}">
            </div>
        </div>
	</div>
	
	<div class="form-group" style="display: flex;">
		<button name="simpan" id="simpan" class="btn btn-primary" style="margin-right: 1%">
			<i class="fa fa-edit"></i> Edit
		</button>
	</div>
</form>

