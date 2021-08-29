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
    public function index()
    {
        $ok = DB::table('tbitem')
            ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
            ->select('tbidentity.nama', 'tbidentity.kelas','tbitem.tgl_pinjam')
            ->distinct()
            ->get();

        $brg = DB::table('tbitem')
            ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
            ->select('tbidentity.nama','tbitem.kodebarang')
            ->distinct()
            ->get();

        $brg2 = DB::table('tbitem')
            ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
            ->select('tbitem.nama')
            ->get();

        $qty = DB::table('tbitem')
            ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
            ->select('tbidentity.nama','tbitem.nama','tbitem.qty')
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
        $kelas = $ok[0]->kelas;

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
                'kelas'=> $kelas,
                'kodebarang'=>$mat,
                'namabrg'=>$ex,
                'tgl_pinjam'=> $tgl_pinjam,
                'param'=>$brgcount,
                'qty'=>$e
        );

        return view('detil', ['data'=>$data]);
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

        $cari = DB::table('tbitem')->select('qty')->where('kodebarang', $request->thevalue)->get();


        $count = count($cari);

        if($count!="0"){

            $kodebarang = $request->thevalue;

            $date = Carbon::now();

            $date->toDateTimeString();
            // $daysToAdd = 7;
            $tgl_pinjam = $date->format('Y-m-d H:i:s');

            // $tgl_kembali = $date->addDays($daysToAdd)->format('Y-m-d H:i:s');

            $qty = DB::table('tbitem')->select('qty')->where('kodebarang', $request->thevalue)->get();

            $qtys = $qty[0]->qty;

            $qtyval = $qtys+1;

            $data = array(
                'qty'=> $qtyval,
                'tgl_pinjam'=> $tgl_pinjam,
            );

            DB::table('tbitem')->where('kodebarang', $kodebarang)->update($data);
            
            return redirect('/detil');

        }else{
            $kodebarang = $request->thevalue;

            $nama = DB::table('tbbarang')->select('nama')->where('kodebarang', $request->thevalue)->get();


            $namas = $nama[0]->nama;

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
                'tgl_pinjam'=> $tgl_pinjam,
                'tgl_kembali'=> $tgl_kembali
            );

            DB::table('tbitem')->insert($data);
            
            return redirect('/detil');
        }
    }

    public function store1(Request $request)
    {
        $kode_user = $request->thevalue;

        $select = DB::table('tbsiswa')->select('nama','kelas')->where('kode_user', $kode_user)->get();

        $nama = $select[0]->nama;

        $kelas = $select[0]->kelas;

        $data = array(
                'kode_user'=> $kode_user,
                'nama'=> $nama,
                'kelas'=>$kelas
            );

        DB::table('tbidentity')->insert($data);
        
        return view('index', ['data'=>$data]);
    }

    public function store2(Request $request)
    {
        $nama_siswa = $request->nama;
        $kelas = $request->kelas;

        $brg2 = DB::table('tbitem')
            ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
            ->select('tbidentity.nama', 'tbitem.nama')
            ->distinct()
            ->get();

        $cari_kodeuser = DB::table('tbitem')
            ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
            ->select('tbidentity.nama', 'tbitem.kode_user')
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
                    ->distinct()
                    ->get();


            $countkod = count($kodbar);

            for($b=0;$b< $countkod; $b++){
                $kodebarang = $kodbar[$i]->kodebarang;
            };

            $tgl = DB::table('tbitem')
                ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                ->select('tbidentity.nama', 'tbitem.tgl_pinjam')
                ->distinct()
                ->get();

            $tgl_pinjam = $tgl[0]->tgl_pinjam;
            $tgl_kembali = null;
            
            $qty = DB::table('tbitem')
                ->join('tbidentity', 'tbitem.kode_user', '=', 'tbidentity.kode_user')
                ->select('tbitem.kodebarang','tbidentity.nama', 'tbitem.qty')
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
                 return redirect('/')->with('alert','Qty tidak bisa dibawah 0');
            }
            $data = array(
                    'kode_user'=>$kode_user,
                    'nama_siswa'=> $nama_siswa,
                    'kelas'=> $kelas,
                    'kodebarang'=>$kodebarang,
                    'nama_barang'=>$nama_barang,
                    'qty'=>$qtys,
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

        DB::table('tbitem')->truncate();
        DB::table('tbidentity')->truncate();

        return redirect('/')->with('alert','Berhasil');
    }

    public function store3(Request $request)
    {
        $kodebarang = $request->kodebarang;
        $kode_user = $request->kode_user;

        $select_if = DB::table('tbitem')->select('*')->where('kodebarang', $kodebarang)->get();

        $select_count = count($select_if);

        if($select_count!=0){

            $qty_get = $request->qty;

            $select_qty = DB::table('tbitem')->select('qty')->where('kodebarang', $kodebarang)->get();

            $qty_database = $select_qty[0]->qty;

            $qty = $qty_get+$qty_database;

            $date = Carbon::now();

            $date->toDateTimeString();
            $tgl_pinjam = $date->format('Y-m-d H:i:s');

            $data = array(
                    'qty'=>$qty,
                    'tgl_pinjam'=>$tgl_pinjam,
            );

            DB::table('tbitem')->where('kodebarang', $kodebarang)->update($data);
            
            return redirect('/detil');

        }else{
            $qty = $request->qty;

            $select_nama = DB::table('tbbarang')->select('nama')->where('kodebarang', $kodebarang)->get();

            $nama_barang = $select_nama[0]->nama;

            $date = Carbon::now();

            $date->toDateTimeString();
            $tgl_pinjam = $date->format('Y-m-d H:i:s');

            $tgl_kembali = null;

            $data = array(
                    'kode_user'=>$kode_user,
                    'kodebarang'=>$kodebarang,
                    'nama'=>$nama_barang,
                    'qty'=>$qty,
                    'tgl_pinjam'=>$tgl_pinjam,
                    'tgl_kembali'=>$tgl_kembali
            );

            DB::table('tbitem')->insert($data);

            return redirect('/detil');
        }
        
    }

    public function storem(Request $request)
    {
        $kode_user = $request->thevalue;

        $select = DB::table('tbsiswa')->select('nama','kelas')->where('kode_user', $kode_user)->get();
        
        $scanner = DB::table('tbbarang')
                ->select('*')
                ->get();

        $nama = $select[0]->nama;

        $kelas = $select[0]->kelas;

        $data = array(
                'kode_user'=> $kode_user,
                'nama'=> $nama,
                'kelas'=>$kelas
            );

        DB::table('tbidentity')->insert($data);

        $p = count($scanner);


        $scan = array(
                'kode_user'=>$kode_user,
                'brg'=>$scanner,
        );

        // return $scan;
        return view('manual', ['scan'=>$scan]);

        // return view('manual')->with('scan', $scan);
    }

    public function storer(Request $request)
    {
        $kode_user = $request->thevalue;

        $select = DB::table('tbsiswa')->select('nama','kelas')->where('kode_user', $kode_user)->get();
        
        $scanner = DB::table('tbdetil')
                ->select('*')
                ->where('kode_user', $kode_user)
                ->where('status', "belum")
                ->get();


        $scan = array(
                'kode_user'=>$kode_user,
                'brg'=>$scanner,
        );

        // return $scan;
        return view('return', ['scan'=>$scan]);
    }

    public function storen(Request $request)
    {
        $id = $request->id;
        $kode_user = $request->kode_user;

        $select_if = DB::table('tbdetil')->select('*')->where('id', $id)->get();

        $select_count = count($select_if);

        if($select_count!=0){

            $qty_get = $request->qty;

            $select_qty = DB::table('tbdetil')->select('qty')->where('id', $id)->get();

            $qty_database = $select_qty[0]->qty;

            $qty = $qty_database-$qty_get;

            if($qty<0){
                return redirect('/idr')->with('alert','Qty tidak bisa dibawah 0');
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
            
            return redirect('/idr')->with('alert','Berhasil');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
