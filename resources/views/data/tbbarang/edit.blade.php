@if(Session::has('nama'))
@else
<script type="text/javascript">
    window.location.href = '/login';
</script>
@endif

<h1 class="h3 mb-5 text-gray-800">Insert Barang</h1>

<form method="POST" action="{{url('/data/update', $data[0]->kodebarang)}}" class="form-data" id="form-data">  
    @csrf
    @method('PUT')
	<input type="hidden" id="id" name="">
	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				<label>Kode Barang</label>
				<input type="text" name="kodebarang" class="form-control" required value="{{$data[0]->kodebarang}}" readonly>
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
				<label>Qty</label><br>
				<input type="number" name="qty" class="form-control" required min="0" oninput="validity.valid||(value='');" value="{{$data[0]->qty}}">
			</div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Lokasi</label><br>
                <input type="text" name="lokasi" class="form-control" required value="{{$data[0]->lokasi}}">
            </div>
        </div>
	</div>
	
	<div class="form-group" style="display: flex;">
		<button name="simpan" id="simpan" class="btn btn-primary" style="margin-right: 1%">
			<i class="fa fa-edit"></i> Edit
		</button>
	</div>
</form>

