@if(Session::has('nama'))
@else
<script type="text/javascript">
    window.location.href = '/login';
</script>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Detil</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display" id="myTable" width="100%" cellspacing="0" style="text-align: center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Kode User</th>
                        <th>Nama User</th>
                        <th>Keterangan</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Lokasi</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $val)
                        <tr>
                            <td>{{$val->id}}</td>
                            <td>{{$val->kode_user}}</td>
                            <td>{{$val->nama_user}}</td>
                            <td>{{$val->ket}}</td>
                            <td>{{$val->kodebarang}}</td>
                            <td>{{$val->nama_barang}}</td>
                            <td>{{$val->qty}}</td>
                            <td>{{$val->lokasi}}</td>
                            <td>{{$val->tgl_pinjam}}</td>
                            <td>{{$val->tgl_kembali}}</td>
                            <td>{{$val->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
        $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
           