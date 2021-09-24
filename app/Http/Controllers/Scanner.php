<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scan;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Scanner extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index0(Request $request)
    {
        $valid = $request->valid;

        if($valid=="Manual"){
            return redirect('/iden');
        }else if($valid=="Otomatis"){
            return redirect('/');
        }else if($valid=="Kembalikan"){
            return redirect('/idr');
        }else if($valid=="Scan"){
            return redirect('/');
        }

        return $valid;
    }

    // public function index2()
    // {
    //     $scan = DB::table('tbbarang')
    //             ->select('*')
    //             ->get();

    //     $counts = count($scan);

    //     // return $scan;
    //     return view('manual', ['scan'=>$scan]);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kode_user = $request->kode_user;
        $kodebarang = $request->thevalue;

        $se_brg = DB::table('tbbarang')
            ->select('*')
            ->where('kodebarang', $kodebarang)
            ->get();

        $c_brg = count($se_brg);

        if($c_brg!=0){

            $cari = DB::table('tbitem')
                ->select('qty')
                ->where('kodebarang', $request->thevalue)
                ->where('kode_user', $kode_user)
                ->get();

            $count = count($cari);

            if($count!="0"){

                $kodebarang = $request->thevalue;

                $date = Carbon::now();

                $date->toDateTimeString();
                // $daysToAdd = 7;
                $tgl_pinjam = $date->format('Y-m-d H:i:s');

                // $tgl_kembali = $date->addDays($daysToAdd)->format('Y-m-d H:i:s');

                $qty = DB::table('tbitem')
                    ->select('qty')
                    ->where('kodebarang', $request->thevalue)
                    ->where('kode_user', $kode_user)
                    ->get();

                $qtys = $qty[0]->qty;

                $qtyval = $qtys+1;

                $data = array(
                    'qty'=> $qtyval,
                    'tgl_pinjam'=> $tgl_pinjam,
                );

                DB::table('tbitem')->where('kodebarang', $kodebarang)->where('kode_user', $kode_user)->update($data);


                
                $ok = DB::table('tbitem')
                ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                ->select('tbidentity.nama', 'tbidentity.ket','tbitem.tgl_pinjam')
                ->where('tbidentity.kode_user', $kode_user)
                ->distinct()
                ->get();


                $brg = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbidentity.nama','tbitem.kodebarang')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->distinct()
                    ->get();

                $brg2 = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbitem.nama')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->get();

                $qty = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbidentity.nama','tbitem.nama','tbitem.qty')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->distinct()
                    ->get();


                $b = "";
                $brgcount = count($brg);

                for ($i=0; $i < $brgcount ; $i++) { 
                    $b .= $brg[$i]->kodebarang . ",";
                }

                $leng = strlen($b);

                $mat = Str::substr($b, 0, $leng - 1);

                $nama = $ok[0]->nama;
                $tgl_pinjam = $ok[0]->tgl_pinjam;
                // $tgl_kembali = $ok[0]->tgl_kembali;
                $ket = $ok[0]->ket;

                $brg2count = count($brg2); 

                $s = "";
                for ($i=0; $i < $brg2count ; $i++) { 
                    $s .= $brg2[$i]->nama . ",";
                }

                $len = strlen($s);

                $match = Str::substr($s, 0, $len - 1);

                $ex = explode(',', $match);


                $qtyc = count($qty);


                $q = "";
                for ($i=0; $i < $qtyc ; $i++) { 
                    $q .= $qty[$i]->qty . ",";
                }

                $le = strlen($q);

                $ma = Str::substr($q, 0, $le - 1);

                $e = explode(',', $ma);

                $data = array(
                        'nama'=> $nama,
                        'ket'=> $ket,
                        'kodebarang'=>$mat,
                        'namabrg'=>$ex,
                        'tgl_pinjam'=> $tgl_pinjam,
                        'param'=>$brgcount,
                        'qty'=>$e
                );

                return view('detil', ['data'=>$data]);

            }else{
                $kodebarang = $request->thevalue;

                $nama = DB::table('tbbarang')->select('nama')->where('kodebarang', $request->thevalue)->get();

                $lokasi = DB::table('tbbarang')->select('lokasi')->where('kodebarang', $request->thevalue)->get();


                $namas = $nama[0]->nama;
                $lokasis = $lokasi[0]->lokasi;

                $date = Carbon::now();

                $date->toDateTimeString();
                // $daysToAdd = 7;
                $tgl_pinjam = $date->format('Y-m-d H:i:s');

                // $tgl_kembali = $date->addDays($daysToAdd)->format('Y-m-d H:i:s');
                $tgl_kembali = null;

                $qty = 1;

                $data = array(
                    'kode_user'=> $kode_user,
                    'kodebarang'=> $kodebarang,
                    'nama'=> $namas,
                    'qty'=>$qty,
                    'lokasi'=>$lokasis,
                    'tgl_pinjam'=> $tgl_pinjam,
                    'tgl_kembali'=> $tgl_kembali
                );

                DB::table('tbitem')->insert($data);


                
                $ok = DB::table('tbitem')
                ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                ->select('tbidentity.nama', 'tbidentity.ket','tbitem.tgl_pinjam')
                ->where('tbidentity.kode_user', $kode_user)
                ->distinct()
                ->get();


                $brg = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbidentity.nama','tbitem.kodebarang')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->distinct()
                    ->get();

                $brg2 = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbitem.nama')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->get();

                $qty = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbidentity.nama','tbitem.nama','tbitem.qty')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->distinct()
                    ->get();


                $b = "";
                $brgcount = count($brg);

                for ($i=0; $i < $brgcount ; $i++) { 
                    $b .= $brg[$i]->kodebarang . ",";
                }

                $leng = strlen($b);

                $mat = Str::substr($b, 0, $leng - 1);

                $nama = $ok[0]->nama;
                $tgl_pinjam = $ok[0]->tgl_pinjam;
                // $tgl_kembali = $ok[0]->tgl_kembali;
                $ket = $ok[0]->ket;

                $brg2count = count($brg2); 

                $s = "";
                for ($i=0; $i < $brg2count ; $i++) { 
                    $s .= $brg2[$i]->nama . ",";
                }

                $len = strlen($s);

                $match = Str::substr($s, 0, $len - 1);

                $ex = explode(',', $match);


                $qtyc = count($qty);


                $q = "";
                for ($i=0; $i < $qtyc ; $i++) { 
                    $q .= $qty[$i]->qty . ",";
                }

                $le = strlen($q);

                $ma = Str::substr($q, 0, $le - 1);

                $e = explode(',', $ma);

                $data = array(
                        'nama'=> $nama,
                        'ket'=> $ket,
                        'kodebarang'=>$mat,
                        'namabrg'=>$ex,
                        'tgl_pinjam'=> $tgl_pinjam,
                        'param'=>$brgcount,
                        'qty'=>$e
                );

                return view('detil', ['data'=>$data]);
            }
        }else{
            return redirect('/')->with('brg', 'brg');
        }
    }

    public function store1(Request $request)
    {
        $kode_user = $request->thevalue;

        $select = DB::table('tbuser')->select('nama','ket')->where('kode_user', $kode_user)->get();

        $count = count($select);
        if($count>0){
            $nama = $select[0]->nama;

            $ket = $select[0]->ket;

            $data = array(
                    'kode_user'=> $kode_user,
                    'nama'=> $nama,
                    'ket'=>$ket
                );

            DB::table('tbidentity')->insert($data);
            
            return view('index', ['data'=>$data]);
        }else{
            return redirect('/')->with('iden', 'iden');
        }


        
    }

    public function store2(Request $request)
    {
        $nama_siswa = $request->nama;
        $ket = $request->ket;

        $brg2 = DB::table('tbitem')
            ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
            ->select('tbidentity.nama', 'tbitem.nama')
            ->where('tbidentity.nama', $nama_siswa)
            ->distinct()
            ->get();

        $cari_kodeuser = DB::table('tbitem')
            ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
            ->select('tbidentity.nama', 'tbitem.kode_user')
            ->where('tbidentity.nama', $nama_siswa)
            ->distinct()
            ->get();

        $kode_user = $cari_kodeuser[0]->kode_user;

        $count = count($brg2);

        $i=0;
        for ($i; $i < $count; $i++) { 

            for($a=0; $a < $count; $a++){
                $nama_barang = $brg2[$i]->nama;
            };

            $kodbar = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbidentity.nama', 'tbitem.nama', 'tbitem.kodebarang')
                    ->where('tbidentity.nama', $nama_siswa)
                    ->distinct()
                    ->get();

            $countkod = count($kodbar);

            for($b=0;$b< $countkod; $b++){
                $kodebarang = $kodbar[$i]->kodebarang;
            };

            $select_lokasi = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbidentity.nama', 'tbitem.nama', 'tbitem.lokasi')
                    ->where('tbidentity.nama', $nama_siswa)
                    ->distinct()
                    ->get();

            $countlok = count($select_lokasi);

            for ($k=0; $k <$countlok ; $k++) { 
                $lokasi = $select_lokasi[$i]->lokasi;
            }

            $tgl = DB::table('tbitem')
                ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                ->select('tbidentity.nama', 'tbitem.tgl_pinjam')
                ->where('tbidentity.nama', $nama_siswa)
                ->distinct()
                ->get();

            $tgl_pinjam = $tgl[0]->tgl_pinjam;
            $tgl_kembali = null;
            
            $qty = DB::table('tbitem')
                ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                ->select('tbitem.kodebarang','tbidentity.nama', 'tbitem.qty')
                ->where('tbidentity.nama', $nama_siswa)
                ->distinct()
                ->get();

            $qtyc = count($qty);

            for ($c=0; $c < $qtyc ; $c++) { 
                $qtys = $qty[$i]->qty;
            };

            $status = "belum";

            $qtybrg = DB::table('tbbarang')
                ->select('*')
                ->where('kodebarang', $kodebarang)
                ->get();

            $qtyb = $qtybrg[0]->qty;


            $qtybaru = $qtyb-$qtys;

            if($qtybaru<0){
                 return redirect('/')->with('gagal','gagal');
            }
            $data = array(
                    'kode_user'=>$kode_user,
                    'nama_user'=> $nama_siswa,
                    'ket'=>$ket,
                    'kodebarang'=>$kodebarang,
                    'nama_barang'=>$nama_barang,
                    'qty'=>$qtys,
                    'lokasi'=>$lokasi,
                    'tgl_pinjam'=>$tgl_pinjam,
                    'tgl_kembali'=>$tgl_kembali,
                    'status'=>$status
            );

            $qtyarr = array(
                    'qty'=>$qtybaru,
            );

        DB::table('tbdetil')->insert($data);
        DB::table('tbbarang')->where('kodebarang', $kodebarang)->update($qtyarr);

        };

        DB::table('tbitem')->where('kode_user', $kode_user)->delete();
        DB::table('tbidentity')->where('kode_user', $kode_user)->delete();

        return redirect('/')->with('berhasil','berhasil');
    }

    public function storem(Request $request)
    {
        $kode_user = $request->thevalue;

        $select = DB::table('tbuser')
            ->select('nama','ket')
            ->where('kode_user', $kode_user)
            ->get();
        
        $count = count($select);

        if($count>0){
            $scanner = DB::table('tbbarang')
                ->select('*')
                ->get();

            $nama = $select[0]->nama;

            $ket = $select[0]->ket;

            $data = array(
                    'kode_user'=> $kode_user,
                    'nama'=> $nama,
                    'ket'=>$ket
                );

            DB::table('tbidentity')->insert($data);

            $p = count($scanner);

            $scan = array(
                    'kode_user'=>$kode_user,
                    'brg'=>$scanner,
            );

            return view('manual', ['scan'=>$scan]);

        }else{
            return redirect('/iden')->with('iden','iden');
        }
        
    }

    public function store3(Request $request)
    {
        $kodebarang = $request->kodebarang;
        $kode_user = $request->kode_user;

        $select_qt = DB::table('tbbarang')
                ->select('*')
                ->where('kodebarang', $kodebarang)
                ->get();

        $count_qt = count($select_qt);
        if($count_qt!=0){

            $pick_qty = $select_qt[0]->qty;
            $qty_get = $request->qty;

            if($pick_qty<$qty_get){
                return redirect('iden')->with('gagal', 'gagal');
            }


            $select_if = DB::table('tbitem')
                ->select('*')
                ->where('kodebarang', $kodebarang)
                ->where('kode_user', $kode_user)
                ->get();

            $select_count = count($select_if);

            if($select_count!=0){

                $qty_get = $request->qty;

                $select_qty = DB::table('tbitem')
                    ->select('qty')
                    ->where('kodebarang', $kodebarang)
                    ->where('kode_user', $kode_user)
                    ->get();

                $qty_database = $select_qty[0]->qty;

                $qty = $qty_get+$qty_database;

                $date = Carbon::now();

                $date->toDateTimeString();
                $tgl_pinjam = $date->format('Y-m-d H:i:s');

                $data = array(
                        'qty'=>$qty,
                        'tgl_pinjam'=>$tgl_pinjam,
                );

                DB::table('tbitem')
                    ->where('kodebarang', $kodebarang)
                    ->where('kode_user', $kode_user)
                    ->update($data);

                
                $ok = DB::table('tbitem')
                ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                ->select('tbidentity.nama', 'tbidentity.ket','tbitem.tgl_pinjam')
                ->where('tbidentity.kode_user', $kode_user)
                ->distinct()
                ->get();


                $brg = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbidentity.nama','tbitem.kodebarang')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->distinct()
                    ->get();

                $brg2 = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbitem.nama')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->get();

                $qty = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbidentity.nama','tbitem.nama','tbitem.qty')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->distinct()
                    ->get();


                $b = "";
                $brgcount = count($brg);

                for ($i=0; $i < $brgcount ; $i++) { 
                    $b .= $brg[$i]->kodebarang . ",";
                }

                $leng = strlen($b);

                $mat = Str::substr($b, 0, $leng - 1);

                $nama = $ok[0]->nama;
                $tgl_pinjam = $ok[0]->tgl_pinjam;
                // $tgl_kembali = $ok[0]->tgl_kembali;
                $ket = $ok[0]->ket;

                $brg2count = count($brg2); 

                $s = "";
                for ($i=0; $i < $brg2count ; $i++) { 
                    $s .= $brg2[$i]->nama . ",";
                }

                $len = strlen($s);

                $match = Str::substr($s, 0, $len - 1);

                $ex = explode(',', $match);


                $qtyc = count($qty);


                $q = "";
                for ($i=0; $i < $qtyc ; $i++) { 
                    $q .= $qty[$i]->qty . ",";
                }

                $le = strlen($q);

                $ma = Str::substr($q, 0, $le - 1);

                $e = explode(',', $ma);

                $data = array(
                        'nama'=> $nama,
                        'ket'=> $ket,
                        'kodebarang'=>$mat,
                        'namabrg'=>$ex,
                        'tgl_pinjam'=> $tgl_pinjam,
                        'param'=>$brgcount,
                        'qty'=>$e
                );

                return view('detil', ['data'=>$data]);

            }else{
                $qty = $request->qty;

                $select_nama = DB::table('tbbarang')
                    ->select('nama')
                    ->where('kodebarang', $kodebarang)
                    ->get();

                $select_lokasi = DB::table('tbbarang')
                    ->select('lokasi')
                    ->where('kodebarang', $kodebarang)
                    ->get();

                $nama_barang = $select_nama[0]->nama;
                $lokasi = $select_lokasi[0]->lokasi;

                $date = Carbon::now();

                $date->toDateTimeString();
                $tgl_pinjam = $date->format('Y-m-d H:i:s');

                $tgl_kembali = null;

                $data = array(
                        'kode_user'=>$kode_user,
                        'kodebarang'=>$kodebarang,
                        'nama'=>$nama_barang,
                        'qty'=>$qty,
                        'lokasi'=>$lokasi,
                        'tgl_pinjam'=>$tgl_pinjam,
                        'tgl_kembali'=>$tgl_kembali
                );

                DB::table('tbitem')->insert($data);

                $ok = DB::table('tbitem')
                ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                ->select('tbidentity.nama', 'tbidentity.ket','tbitem.tgl_pinjam')
                ->where('tbidentity.kode_user', $kode_user)
                ->distinct()
                ->get();


                $brg = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbidentity.nama','tbitem.kodebarang')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->distinct()
                    ->get();

                $brg2 = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbitem.nama')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->get();

                $qty = DB::table('tbitem')
                    ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                    ->select('tbidentity.nama','tbitem.nama','tbitem.qty')
                    ->where('tbidentity.kode_user', $kode_user)
                    ->distinct()
                    ->get();


                $b = "";
                $brgcount = count($brg);

                for ($i=0; $i < $brgcount ; $i++) { 
                    $b .= $brg[$i]->kodebarang . ",";
                }

                $leng = strlen($b);

                $mat = Str::substr($b, 0, $leng - 1);

                $nama = $ok[0]->nama;
                $tgl_pinjam = $ok[0]->tgl_pinjam;
                // $tgl_kembali = $ok[0]->tgl_kembali;
                $ket = $ok[0]->ket;

                $brg2count = count($brg2); 

                $s = "";
                for ($i=0; $i < $brg2count ; $i++) { 
                    $s .= $brg2[$i]->nama . ",";
                }

                $len = strlen($s);

                $match = Str::substr($s, 0, $len - 1);

                $ex = explode(',', $match);


                $qtyc = count($qty);


                $q = "";
                for ($i=0; $i < $qtyc ; $i++) { 
                    $q .= $qty[$i]->qty . ",";
                }

                $le = strlen($q);

                $ma = Str::substr($q, 0, $le - 1);

                $e = explode(',', $ma);

                $data = array(
                        'nama'=> $nama,
                        'ket'=> $ket,
                        'kodebarang'=>$mat,
                        'namabrg'=>$ex,
                        'tgl_pinjam'=> $tgl_pinjam,
                        'param'=>$brgcount,
                        'qty'=>$e
                );

                return view('detil', ['data'=>$data]);
            }
        }else{
            return redirect('/iden')->with('brg', 'brg');
        }
        
    }

    public function storer(Request $request)
    {
        $kode_user = $request->thevalue;

        $select = DB::table('tbuser')->select('nama','ket')->where('kode_user', $kode_user)->get();
        
        $count = count($select);

        if($count>0){
            $scanner = DB::table('tbdetil')
                ->select('*')
                ->where('kode_user', $kode_user)
                ->where('status', "belum")
                ->get();


            $scan = array(
                    'kode_user'=>$kode_user,
                    'brg'=>$scanner,
            );

            return view('return', ['scan'=>$scan]);
        }else{
            return redirect('/idr')->with('iden','iden');
        }
        
    }

    public function storen(Request $request)
    {
        $id = $request->id;
        $kode_user = $request->kode_user;
        $all = $request->all;

        $s_ids = DB::table('tbdetil')
            ->select('id', 'status')
            ->where('id', $id)
            ->where('status', "belum")
            ->where('kode_user', $kode_user)
            ->get();

        $c_ids = count($s_ids);

            if($all==""){
                if($c_ids!=0){
                    $select_if = DB::table('tbdetil')->select('*')->where('id', $id)->get();

                    $select_count = count($select_if);

                    if($select_count!=0){

                        $qty_get = $request->qty;

                        $select_qty = DB::table('tbdetil')->select('qty')->where('id', $id)->get();

                        $qty_database = $select_qty[0]->qty;

                        $qty = $qty_database-$qty_get;

                        if($qty<0){
                            return redirect('/idr')->with('gagal','gagal');
                        }
                        $date = Carbon::now();

                        $date->toDateTimeString();
                        $tgl_kembali = $date->format('Y-m-d H:i:s');

                        $data = array(
                                'qty'=>$qty,
                                'tgl_kembali'=>$tgl_kembali,
                        );
                        DB::table('tbdetil')->where('id', $id)->update($data);
                        

                        $kodbar = DB::table('tbdetil')->select('kodebarang')->where('id', $id)->get();

                        $kodebarang = $kodbar[0]->kodebarang;

                        
                        $select_item = DB::table('tbbarang')->select('*')->where('kodebarang', $kodebarang)->get();

                        $qty_item = $select_item[0]->qty;

                        $qty_up_item = $qty_item+$qty_get;

                        $qtyarray = array(
                                'qty'=>$qty_up_item
                        );
                       
                        DB::table('tbbarang')->where('kodebarang', $kodebarang)->update($qtyarray);

                        $statusa = "sudah";

                        $statusarr = array(
                                'status'=>$statusa
                        );
                        if($qty<=0){
                            DB::table('tbdetil')->where('id',$id)->update($statusarr);
                        }
                        
                        return redirect('/idr')->with('berhasil','berhasil');

                    }else{
                        return redirect('/idr')->with('gagal', 'gagal');
                    }
                }else{
                    return redirect('/idr')->with('id', 'id');
                }
            }else{
                    $select = DB::table('tbdetil')
                                ->select('id', 'kode_user', 'nama_user', 'kodebarang', 'qty')
                                ->where('status', "belum")
                                ->where('kode_user', $kode_user)
                                ->get();

                    $count = count($select);

                    $i = 0;

                    for ($i; $i < $count ; $i++) { 
                        
                        for($a=0; $a < $count; $a++){
                            $id = $select[$i]->id;
                        }

                        $date = Carbon::now();

                        $date->toDateTimeString();
                        $tgl_kembali = $date->format('Y-m-d H:i:s');

                        $status = "sudah";
                        
                        for($b=0; $b < $count; $b++){
                            $qty = $select[$i]->qty;
                        }

                        for($c=0; $c < $count; $c++){
                            $kodbar = $select[$i]->kodebarang;
                        }

                        $brg = DB::table('tbbarang')->select('qty')->where('kodebarang', $kodbar)->get();

                        $qtybrg = $brg[0]->qty;

                        $qty_akhir = $qtybrg+$qty;

                        $qtyup = array(
                            'qty'=>$qty_akhir
                        );

                        DB::table('tbbarang')->where('kodebarang', $kodbar)->update($qtyup);
                     
                        $qty = 0;
                        $data = array(
                            'qty'=>$qty,
                            'tgl_kembali'=> $tgl_kembali,
                            'status'=> $status,
                        );

                        DB::table('tbdetil')->where('id', $id)->update($data);
                    }
                    return redirect('/idr')->with('berhasil','berhasil');
                }
    }

    public function login(Request $request)
    {
        $kode_user = $request->kode_user;
        $pass = $request->pass;

        $select = DB::table('tbadmin')
            ->select('*')
            ->where('kode_user', $kode_user)
            ->where('pass', $pass)
            ->get();

        $count = count($select);

        if($count!=0){
            $nama = $select[0]->nama;
            $kod_user = $select[0]->kode_user;
            session(['nama' => $nama]);
            session(['kode_user' => $kod_user]);
            return redirect('/admin');

        }else{
            return redirect('/login')->with('invalid', 'invalid');
        }
        

    }

    public function logout(Request $request)
    {
        $kode_session = $request->kode_session;
        $nama_session = $request->nama_session;

        $request->session()->forget(['kode_user', $kode_session]);
        $request->session()->forget(['nama', $nama_session]);

        return redirect('/login')->with('logout', 'logout');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function storebrg(Request $request)
    {
        $kodebarang = $request->kodebarang;
        $nama = $request->nama;
        $qty = $request->qty;
        $lokasi = $request->lokasi;

        $check = DB::table('tbbarang')->where('kodebarang', $kodebarang)->get();

        $count = count($check);

        if($count===0){

            $data = array(
                'kodebarang'=>$kodebarang,
                'qty'=>$qty,
                'nama'=>$nama,
                'lokasi'=>$lokasi
            );

            DB::table('tbbarang')->insert($data);

            return redirect('/admin')->with('berhasilbrg', 'berhasilbrg');
        }else{
            return redirect('/admin')->with('gagalbrg', 'gagalbrg');
        }
    }

    public function storeadm(Request $request)
    {
        $kodeuser = $request->kodeuser;
        $nama = $request->nama;
        $pass = $request->pass;

        $check = DB::table('tbadmin')->where('kode_user', $kodeuser)->get();

        $count = count($check);

        if($count===0){

            $data = array(
                'kode_user'=>$kodeuser,
                'nama'=>$nama,
                'pass'=>$pass
            );

            DB::table('tbadmin')->insert($data);

            return redirect('/admin')->with('berhasiladm', 'berhasiladm');
        }else{
            return redirect('/admin')->with('gagaladm', 'gagaladm');
        }
    }

    public function storeuser(Request $request)
    {
        $kodeuser = $request->kodeuser;
        $nama = $request->nama;
        $ket = $request->ket;

        $check = DB::table('tbuser')->where('kode_user', $kodeuser)->get();

        $count = count($check);

        if($count===0){

            $data = array(
                'kode_user'=>$kodeuser,
                'nama'=>$nama,
                'ket'=>$ket
            );

            DB::table('tbuser')->insert($data);

            return redirect('/admin')->with('berhasiluser', 'berhasiluser');
        }else{
            return redirect('/admin')->with('gagaluser', 'gagaluser');
        }
    }

    public function storeiden(Request $request)
    {
        $kodeuser = $request->kodeuser;
        $nama = $request->nama;
        $ket = $request->ket;

        $check = DB::table('tbidentity')->where('kode_user', $kodeuser)->get();

        $count = count($check);

        if($count===0){

            $data = array(
                'kode_user'=>$kodeuser,
                'nama'=>$nama,
                'ket'=>$ket
            );

            DB::table('tbidentity')->insert($data);

            return redirect('/admin')->with('berhasiliden', 'berhasiliden');
        }else{
            return redirect('/admin')->with('gagaliden', 'gagaliden');
        }
    }

    public function show()
    {
        $db = DB::table('tbbarang')->select('*')->get();

        return view('data.tbbarang.showbrg', ['data'=>$db] );
    }

    public function showadm()
    {
        $db = DB::table('tbadmin')->select('*')->get();

        return view('data.tbadmin.showadmin', ['data'=>$db] );
    }

    public function showuser()
    {
        $db = DB::table('tbuser')->select('*')->get();

        return view('data.tbuser.showuser', ['data'=>$db] );
    }

    public function showiden()
    {
        $db = DB::table('tbidentity')->select('*')->get();

        return view('data.tbidentity.showiden', ['data'=>$db] );
    }

    public function showitem()
    {
        $db = DB::table('tbitem')->select('*')->get();

        return view('data.tbitem.showitem', ['data'=>$db] );
    }

    public function showdetil()
    {
        $db = DB::table('tbdetil')->select('*')->get();

        return view('data.tbdetil.showdetil', ['data'=>$db] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('tbbarang')->select('*')->where('kodebarang', $id)->get();

        return view('data.tbbarang.edit', ['data'=> $data])->with('editbrg', 'editbrg');
    }

    public function editadm($id)
    {
        $data = DB::table('tbadmin')->select('*')->where('kode_user', $id)->get();

        return view('data.tbadmin.editadmin', ['data'=> $data])->with('editadm', 'editadm');
    }

    public function edituser($id)
    {
        $data = DB::table('tbuser')->select('*')->where('kode_user', $id)->get();

        return view('data.tbuser.edituser', ['data'=> $data])->with('edituser', 'edituser');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kodebarang = $request->kodebarang;
        $nama = $request->nama;
        $qty = $request->qty;
        $lokasi = $request->lokasi;

        $data = array(
            'qty'=>$qty,
            'nama'=>$nama,
            'lokasi'=>$lokasi
        );

        DB::table('tbbarang')->select('*')->where('kodebarang', $kodebarang)->update($data);

        return redirect('/admin')->with('showbrg', 'showbrg');
    }

    public function updateadm(Request $request, $id)
    {
        $kodeuser = $request->kodeuser;
        $nama = $request->nama;
        $pass = $request->pass;
        $kode_session = $request->kode_session;
        $nama_session = $request->nama_session;

        $data = array(
            'nama'=>$nama,
            'pass'=>$pass
        );

        if($kode_session == $kodeuser){
            if($kodeuser == $kodeuser){
                DB::table('tbadmin')->select('*')->where('kode_user', $kodeuser)->update($data);

                $select = DB::table('tbadmin')
                    ->select('*')
                    ->where('kode_user', $id)
                    ->get();

                $nama_select = $select[0]->nama;

                $request->session()->forget(['nama', $nama_session]);

                session(['nama' => $nama_select]);

                return redirect('/admin')->with('showadm', 'showadm');

            }else{
                return redirect('/admin');
            }
        }else{
            //
        }

        DB::table('tbadmin')->select('*')->where('kode_user', $kodeuser)->update($data);

        return redirect('/admin')->with('showadm', 'showadm');

    }

    public function updateuser(Request $request, $id)
    {
        $kodeuser = $request->kodeuser;
        $nama = $request->nama;
        $ket = $request->ket;

        $data = array(
            'nama'=>$nama,
            'ket'=>$ket
        );

        DB::table('tbuser')->select('*')->where('kode_user', $kodeuser)->update($data);

        return redirect('/admin')->with('showuser', 'showuser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbbarang')->select('*')->where('kodebarang', $id)->delete();

        return redirect('/admin')->with('showbrg', 'showbrg');
    }

    public function destroyadm(Request $request, $id)
    {   
        $kode_session = $request->kode_session;
        $nama_session = $request->nama_session;
        $nama = $request->nama;

        $select = DB::table('tbadmin')
            ->select('*')
            ->where('kode_user', $id)
            ->get();

        $nama_select = $select[0]->nama;

        if($kode_session != $id){
            DB::table('tbadmin')->select('*')->where('kode_user', $id)->delete();
        }else{

        $request->session()->forget(['kode_user', $kode_session]);
        $request->session()->forget(['nama', $nama_session]);

        DB::table('tbadmin')->select('*')->where('kode_user', $id)->delete();
        }

        return redirect('/admin')->with('showadm', 'showadm');
    }

    public function destroyuser($id)
    {
        DB::table('tbuser')->select('*')->where('kode_user', $id)->delete();

        return redirect('/admin')->with('showuser', 'showuser');
    }
}
