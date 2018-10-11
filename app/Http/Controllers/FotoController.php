<?php

namespace App\Http\Controllers;

use App\Foto;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Mobil;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class FotoController extends Controller
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
        return view('Foto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [            
        //     'foto' => 'image|max:2048',
        //     'id_mobil' => 'required|exists:mobils,id'          
        //     ]);
            // $foto = Foto::create($request->except('foto'));
            // isi field foto jika ada foto yang diupload
            // if ($request->hasFile('foto')) {
            // // Mengambil file yang diupload
            // $uploaded_foto = $request->file('foto');
            // // mengambil extension file
            // $extension = $uploaded_foto->getClientOriginalExtension();
            // // membuat nama file random berikut extension
            // $filename = md5(time()) . '.' . $extension;
            // // menyimpan foto ke folder public/img
            // $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/galeri';
            // $uploaded_foto->move($destinationPath, $filename);
            // // mengisi field foto di foto dengan filename yang baru dibuat
            // $foto->foto = $filename;
            // $foto->save();
            if ($request->hasFile('foto')) {
                foreach ($request->foto as $foto){
                    $filename = $foto->getClientOriginalName();
                    $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img\galeri';
                    $foto->move($destinationPath, $filename);
                    $foto = Foto::create($request->except('foto'));
                    $foto->foto = $filename;
                    $foto->save();
            }
        }
            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan"
            ]);
            return redirect()->route('foto.index');
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
    public function edit($id)
    {
        $foto = Foto::find($id);
        return view('Foto.edit')->with(compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [            
            'foto' => 'image|max:2048',
            'id_mobil' => 'required|exists:mobils,id'          
            ]);
            $foto = Foto::find($id);
            $foto->update($request->all());
            if ($request->hasFile('foto')) {
            // menambil foto yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/galeri';
            // memindahkan file ke folder public/img
            $uploaded_foto->move($destinationPath, $filename);
            // hapus foto lama, jika ada
            if ($foto->foto) {
            $old_foto = $foto->foto;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'img/galeri'
            . DIRECTORY_SEPARATOR . $foto->foto;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
            // ganti field foto dengan foto yang baru
            $foto->foto = $filename;
            $foto->save();
            }
            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan"
            ]);
            return redirect()->route('foto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = Foto::find($id);
        // hapus foto lama, jika ada
        if ($foto->foto) {
        $old_foto = $foto->foto;
        $filepath = public_path() . DIRECTORY_SEPARATOR . 'img/galeri'
        . DIRECTORY_SEPARATOR . $foto->foto;
        try {
        File::delete($filepath);
        } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
        }
        }
        $foto->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Foto berhasil dihapus"
        ]);
        return redirect()->route('foto.index');
    }
}
