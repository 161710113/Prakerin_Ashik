<?php

namespace App\Http\Controllers;

use App\Lokasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(Request $request, Builder $builder)
    {
    if ($request->ajax()) {
    $lokasi = Lokasi::select(['id', 'nama_kota']);
    // return Datatables::of($lokasi)->make(true);
    return Datatables::of($lokasi)
            ->addColumn('action', function ($lokasi) {  
                return view('datatable._action', [
                'model'=> $lokasi,
                'form_url'=> route('lokasi.destroy', $lokasi->id),
                'edit_url' => route('lokasi.edit',$lokasi->id),
                'confirm_message' => 'Yakin mau menghapus ' .$lokasi->nama_kota . '?'
            ]);
            })->make(true);
    }
    $html = $builder    
    ->addColumn(['data' => 'nama_kota', 'name'=>'nama_kota', 'title'=>'Nama Kota'])
    ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false,
                 'searchable'=>false])
    ;
    return view('Lokasi.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, ['nama_kota' => 'required|unique:lokasis']);
        $lokasi = lokasi::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $lokasi->nama_kota"
            ]);
        return redirect()->route('lokasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
        //
        $lokasi = Lokasi::find($lokasi->id);
        return view('Lokasi.edit')->with(compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        //
        $this->validate($request, ['nama_kota' => 'required|unique:lokasis,nama_kota,'. $lokasi->id]);
        $lokasi = lokasi::find($lokasi->id);
        $lokasi->update($request->only('nama_kota'));
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $lokasi->nama_kota"
        ]);
        return redirect()->route('lokasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        //
        Lokasi::destroy($lokasi->id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"lokasi berhasil dihapus"
        ]);
        return redirect()->route('lokasi.index');
    }
}
