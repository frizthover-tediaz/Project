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
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $val)
                        <tr>
                            <td>{{$val->id}}</td>
                            <td>{{$val->kode_user}}</td>
                            <td>{{$val->kodebarang}}</td>
                            <td>{{$val->nama}}</td>
                            <td>{{$val->qty}}</td>
                            <td>{{$val->lokasi}}</td>
                            <td>{{$val->tgl_pinjam}}</td>
                            <td>
                                <form method="POST" action="data/deleteitem/{{$val->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button id="delete" name="hapus" class="btn btn-danger btn-sm w-100 mt-1"> <i class="fa fa-trash"></i> Hapus </button>
                                </form>
                            </td>
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
           