@if(Session::has('nama'))
@else
<script type="text/javascript">
    window.location.href = '/login';
</script>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Item</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display" id="myTable" width="100%" cellspacing="0" style="text-align: center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Kode User</th>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Qty</th>
                        <th>Lokasi</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $val)
                        <tr>
                            <td style="padding: 3%">{{$val->id}}</td>
                            <td style="padding: 3%">{{$val->kode_user}}</td>
                            <td style="padding: 3%">{{$val->kodebarang}}</td>
                            <td style="padding: 3%">{{$val->nama}}</td>
                            <td style="padding: 3%">{{$val->qty}}</td>
                            <td style="padding: 3%">{{$val->lokasi}}</td>
                            <td style="padding: 3%">{{$val->tgl_pinjam}}</td>
                            <td style="padding: 3%">{{$val->tgl_kembali}}</td>
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
           