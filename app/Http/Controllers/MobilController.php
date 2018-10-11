<?php

namespace App\Http\Controllers;

use App\Mobil;
use App\Foto;
use App\Merk;
use App\Tipe;
use App\Lokasi;
use App\User;

use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $mobil = Mobil::with('merk','tipe','lokasi','user');
            return Datatables::of($mobil)
            ->addColumn('action', function($mobil){
                return view('datatable._action', [
                    'model' => $mobil,
                    'form_url' => route('mobil.destroy', $mobil->id),
                    'edit_url' => route('mobil.edit', $mobil->id),
                    'confirm_message' => 'Yakin mau menghapus ' . $mobil->title . '?'
                    ]);
                })->make(true);
            }
            $html = $htmlBuilder
            ->addColumn(['data' => 'nama_mobil', 'name'=>'nama_mobil', 'title'=>'Nama Mobil'])
            ->addColumn(['data' => 'lokasi.nama_kota', 'name'=>'lokasi.nama_kota', 'title'=>'Lokasi'])
            ->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'Pemilik'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
            
            return view('Mobil.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        // $mobil = Mobil::all();
        // $merk = Merk::all();
        // $tipe = Tipe::all();
        // $lokasi = Lokasi::all();
        // $user = User::all();
        // return view('Mobil.create', compact('mobil','merk','tipe','lokasi','user'));
        return view('Mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $this->validate($request, [
            'nama_mobil' => 'required',
            'transmisi' => 'required',
            'bahan_bakar' => 'required',
            'kilometer' => 'required|numeric',
            'kapasitas_mesin' => 'required|numeric',
            'warna' => 'required',
            'harga' => 'required|numeric',
            'no_hp' => 'min:14|required|numeric',
            'deskripsi' => 'required',
            'id_merk' => 'required|exists:merks,id',
            'id_tipe' => 'required|exists:tipes,id',
            'id_lokasi' => 'required|exists:lokasis,id',
            'id_user' => 'required|exists:users,id',            
            ]);
        $mobil = Mobil::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $mobil->nama_mobil"
            ]);
        return redirect()->route('mobil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $mobil = Mobil::find($id);
        // return view('Mobil.edit')->with(compact('mobil'));
        $mobil = Mobil::findOrFail($id);
        $merk = Merk::all();
        $merkselect = Mobil::findOrFail($id)->id_merk;
        $tipe = Tipe::all();
        $tipeselect = Mobil::findOrFail($id)->id_tipe;
        $lokasi = Lokasi::all();
        $lokasiselect = Mobil::findOrFail($id)->id_lokasi;
        $user = User::all();
        $userselect = Mobil::findOrFail($id)->id_user;
        return view('Mobil.edit',compact('mobil','merk','merkselect','tipe','tipeselect','lokasi','lokasiselect','user','userselect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_mobil' => 'required',
            'transmisi' => 'required',
            'bahan_bakar' => 'required',
            'kilometer' => 'required|numeric',
            'kapasitas_mesin' => 'required|numeric',
            'warna' => 'required',
            'harga' => 'required|numeric',
            'no_hp' => 'min:11|required|numeric',
            'deskripsi' => 'required',
            'id_merk' => 'required|exists:merks,id',
            'id_tipe' => 'required|exists:tipes,id',
            'id_lokasi' => 'required|exists:lokasis,id',
            'id_user' => 'required|exists:users,id',            
            ]);
        $mobil = Mobil::find($id);
        $mobil->update($request->all());
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $mobil->nama_mobil"
        ]);
        return redirect()->route('mobil.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobil $mobil)
    {
        Mobil::destroy($mobil->id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Mobil berhasil dihapus"
        ]);
        return redirect()->route('mobil.index');
    }
}
