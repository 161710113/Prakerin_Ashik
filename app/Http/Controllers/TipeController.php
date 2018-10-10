<?php

namespace App\Http\Controllers;

use App\Tipe;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class TipeController extends Controller
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
    $tipe = Tipe::select(['id', 'nama_tipe']);
    // return Datatables::of($tipe)->make(true);
    return Datatables::of($tipe)
            ->addColumn('action', function ($tipe) {  
                return view('datatable._action', [
                'model'=> $tipe,
                'form_url'=> route('tipe.destroy', $tipe->id),
                'edit_url' => route('tipe.edit',$tipe->id),
                'confirm_message' => 'Yakin mau menghapus ' .$tipe->nama_tipe . '?'
            ]);
            })->make(true);
    }
    $html = $builder    
    ->addColumn(['data' => 'nama_tipe', 'name'=>'nama_tipe', 'title'=>'Nama Tipe'])
    ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false,
                 'searchable'=>false])
    ;
    return view('Tipe.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Tipe.create');
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
        $this->validate($request, ['nama_tipe' => 'required|unique:tipes']);
        $tipe = Tipe::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $tipe->nama_tipe"
            ]);
        return redirect()->route('tipe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function show(Tipe $tipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipe $tipe)
    {
        //
        $tipe = Tipe::find($tipe->id);
        return view('Tipe.edit')->with(compact('tipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipe $tipe)
    {
        //
        $this->validate($request, ['nama_tipe' => 'required|unique:tipes,nama_tipe,'. $tipe->id]);
        $tipe = Tipe::find($tipe->id);
        $tipe->update($request->only('nama_tipe'));
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $tipe->nama_tipe"
        ]);
        return redirect()->route('tipe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipe  $tipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipe $tipe)
    {
        //
        Tipe::destroy($tipe->id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Tipe berhasil dihapus"
        ]);
        return redirect()->route('tipe.index');
    }
}
