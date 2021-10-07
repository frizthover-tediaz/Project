@if(Session::has('nama'))
@else
<script type="text/javascript">
	window.location.href = '/login';
</script>
@endif

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin</title>

    <!-- Custom fonts for this -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma:wght@400&display=swap" rel="stylesheet">

    <!-- Custom styles for this -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">

</head>
<html lang="en">
<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-icon">
                    <img class="mini" src="img/logo_icon.png" style="width:2.5rem">
                </div>
                <div class="sidebar-brand-text mx-3" style="text-transform: none;font-size: 26px; font-family: 'Baloo Tamma', sans-serif; font-weight: 400; margin-top: 3%">BoryCo</div>
            </a>

            <hr class="sidebar-divider my-0">
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Insert Data</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data:</h6>

                        <a class="collapse-item" onclick="loadTbbarang()">
                            <i class="fas fa-fw fa-list"></i> Barang
                        </a>
                        <a class="collapse-item" onclick="loadTbadmin()">
                            <i class="fas fa-fw fa-user-cog"></i> Admin
                        </a>
                        <a class="collapse-item" onclick="loadTbuser()">
                            <i class="fas fa-fw fa-user"></i> User
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetable"
                    aria-expanded="true" aria-controls="collapsetable">
                    <i class="fas fa-database fa-cog"></i>
                    <span>Show Data</span>
                </a>
                <div id="collapsetable" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data :</h6>
                        <a class="collapse-item" onclick="showTbbarang()"><i class="fas fa-fw fa-list"></i> Barang</a>
                        <a class="collapse-item" onclick="showTbadmin()"><i class="fas fa-fw fa-user-cog"></i> Admin</a>
                        <a class="collapse-item" onclick="showTbuser()"><i class="fas fa-fw fa-user"></i> User</a>
                        <a class="collapse-item" onclick="showTbidentity()"><i class="fas fa-fw fa-address-book"></i> Identity</a>
                        <a class="collapse-item" onclick="showTbitem()"><i class="fas fa-fw fa-boxes"></i> Item</a>
                        <a class="collapse-item" onclick="showTbdetil()"><i class="fas fa-fw fa-clipboard-list"></i> Detil</a>
                    </div>
                </div>
            </li>


            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Session::has('nama'))
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Session::get('nama')}}</span>
								@endif
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid" id="data">
                    @if($status['status'] == 'berhasil')
                        <div class="alert alert-success" role="alert" style="width: 30%;text-align: left;padding: .5rem .5rem">Data Berhasil Dihapus!
                        </div>

                    @elseif($status['status'] == 'gagal')
                        <div class="alert alert-danger" role="alert" style="width: 30%;text-align: left;padding: .5rem .5rem">Data Gagal Dihapus!
                        </div>

                    @elseif($status['status'] == 'bupd')
                        <div class="alert alert-success" role="alert" style="width: 30%;text-align: left;padding: .5rem .5rem">Data Berhasil Diupdate!
                        </div>
                    @elseif($status['status'] == 'gupd')
                        <div class="alert alert-danger" role="alert" style="width: 30%;text-align: left;padding: .5rem .5rem">Data Gagal Diupdate!
                        </div>
                    
                    @endif
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
					                                <form method="POST" action="/dataeditadm">
					                                    @csrf
					                                    <input type="hidden" name="kode_user" value="{{$val->kode_user}}">
					                                    <button id="edit" name="ubah" class="btn btn-success btn-sm w-100"> <i class="fa fa-edit"></i> Edit </button></a>
					                                </form>

					                                <form method="POST" action="/datadltadms">
					                                    @csrf
					                                    <input type="hidden" name="nama_session" value="{{Session::get('nama')}}">
					                                    <input type="hidden" name="kode_session" value="{{Session::get('kode_user')}}">
					                                    <input type="hidden" name="kode_user" value="{{$val->kode_user}}">
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

                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BoryCo <?= date("Y") ?></span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{url('/logout')}}">
                    	@csrf
                        <input type="hidden" name="nama_session" value="{{Session::get('nama')}}">
                        <input type="hidden" name="kode_session" value="{{Session::get('kode_user')}}">
                    	<button class="btn btn-primary">Logout</button>
                	</form>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="js/alert.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


	<script src="js/tbbarang.js"></script>
    <script src="js/tbadmin.js"></script>
    <script src="js/tbuser.js"></script>
    <script src="js/tbidentity.js"></script>
    <script src="js/tbitem.js"></script>
    <script src="js/tbdetil.js"></script>
	
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
            $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>