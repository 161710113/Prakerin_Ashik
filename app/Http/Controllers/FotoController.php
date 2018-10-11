<?php

namespace App\Http\Controllers;

use App\Foto;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Mobil;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
    if ($request->ajax()) {
        $foto = Foto::with('mobil');
        return Datatables::of($foto)
        ->addColumn('action', function($foto){
            return view('datatable._action', [
                'model'=> $foto,
                'form_url'=> route('foto.destroy', $foto->id),
                'edit_url'=> route('foto.edit', $foto->id),
                'confirm_message' => 'Yakin mau menghapus ' . $foto->title . '?'
                ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'foto', 'name'=>'foto', 'title'=>'Foto'])
        ->addColumn(['data' => 'mobil.nama_mobil', 'name'=>'mobil.nama_mobil', 'title'=>'Nama Mobil'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('Foto.index')->with(compact('html'));
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        //
    }
}
