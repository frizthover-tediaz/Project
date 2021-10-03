@if(Session::has('nama'))
@else
<script type="text/javascript">
    window.location.href = '/login';
</script>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display" id="myTable" width="100%" cellspacing="0" style="text-align: center">
                <thead>
                    <tr>
                        <th>Kode User</th>
                        <th>Nama</th>
                        <th>Password</th>
                        <th>Terakhir Login</th>
                        <th>Terakhir Logout</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $val)
                        <tr>
                            <td>{{$val->kode_user}}</td>
                            <td>{{$val->nama}}</td>
                            <td>{{$val->pass}}</td>
                            <td>{{$val->terakhir_login}}</td>
                            <td>{{$val->terakhir_logout}}</td>
                            <td>
                                <button type="button" id="edit" name="ubah" class="btn btn-success btn-sm w-100" onclick="editTbadmin('{{$val->kode_user}}')"> <i class="fa fa-edit"></i> Edit </button></a>

                                <form method="POST" action="data/deleteadm/{{$val->kode_user}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="nama_session" value="{{Session::get('nama')}}">
                                    <input type="hidden" name="kode_session" value="{{Session::get('kode_user')}}">
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
           