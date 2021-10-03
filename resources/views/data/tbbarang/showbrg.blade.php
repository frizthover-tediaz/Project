<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display" id="myTable" width="100%" cellspacing="0" style="text-align: center">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Qty</th>
                        <th>Lokasi</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $val)
                        <tr>
                            <td>{{$val->kodebarang}}</td>
                            <td>{{$val->nama}}</td>
                            <td>{{$val->qty}}</td>
                            <td>{{$val->lokasi}}</td>
                            <td>
                                <form method="POST" action="/dataeditbrg">
                                    @csrf
                                    <input type="hidden" name="kodebarang" value="{{$val->kodebarang}}">
                                    <button id="edit" name="ubah" class="btn btn-success btn-sm w-100"> <i class="fa fa-edit"></i> Edit </button></a>
                                </form>

                                <form method="POST" action="/datadltbrgs">
                                    @csrf
                                    <input type="hidden" name="kodebarang" value="{{$val->kodebarang}}">
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