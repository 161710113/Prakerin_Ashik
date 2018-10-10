<?php

namespace App\Http\Controllers;

use App\Merk;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class MerkController extends Controller
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
    // public function index()
    // {
    //     //
    //     return view('Merk.index');
    // }
    public function index(Request $request, Builder $builder)
    {
    if ($request->ajax()) {
    $merk = Merk::select(['id', 'nama_merk']);
    // return Datatables::of($merk)->make(true);
    return Datatables::of($merk)
            ->addColumn('action', function ($merk) {  
                return view('datatable._action', [
                'model'=> $merk,
                'form_url'=> route('merk.destroy', $merk->id),
                'edit_url' => route('merk.edit',$merk->id),
                'confirm_message' => 'Yakin mau menghapus ' .$merk->nama_merk . '?'
            ]);
            })->make(true);
    }
    $html = $builder    
    ->addColumn(['data' => 'nama_merk', 'name'=>'nama_merk', 'title'=>'Nama Merk'])
    ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false,
                 'searchable'=>false])
    ;
    return view('Merk.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Merk.create');
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
        $this->validate($request, ['nama_merk' => 'required|unique:merks']);
        $merk = Merk::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $merk->nama_merk"
            ]);
        return redirect()->route('merk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function show(Merk $merk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function edit(Merk $merk)
    {
        //
        $merk = Merk::find($merk->id);
        return view('Merk.edit')->with(compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merk $merk)
    {
        //
        $this->validate($request, ['nama_merk' => 'required|unique:merks,nama_merk,'. $merk->id]);
        $merk = Merk::find($merk->id);
        $merk->update($request->only('nama_merk'));
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $merk->nama_merk"
        ]);
        return redirect()->route('merk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merk $merk)
    {
        //
        Merk::destroy($merk->id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Merk berhasil dihapus"
        ]);
        return redirect()->route('merk.index');
    }
}
