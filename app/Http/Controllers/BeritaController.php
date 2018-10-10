<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File;
use Session;

class BeritaController extends Controller
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
    public function index(Request $request, Builder $builder)
    {
    if ($request->ajax()) {
    $berita = Berita::select(['id', 'judul','isi','sampul']);
    // return Datatables::of($berita)->make(true);
    return Datatables::of($berita)
            ->addColumn('action', function ($berita) {  
                return view('datatable._action', [
                'model'=> $berita,
                'form_url'=> route('berita.destroy', $berita->id),
                'edit_url' => route('berita.edit',$berita->id),
                'confirm_message' => 'Yakin mau menghapus ' .$berita->judul . '?'
            ]);
            })->make(true);
    }
    $html = $builder    
    ->addColumn(['data' => 'judul', 'name'=>'judul', 'title'=>'Judul'])
    // ->addColumn(['data' => 'isi', 'name'=>'isi', 'title'=>'Isi'])
    // ->addColumn(['data' => 'sampul', 'name'=>'sampul', 'title'=>'Sampul'])
    ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false,
                 'searchable'=>false])
    ;
    return view('Berita.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Berita.create');
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
        $this->validate($request, ['judul' => 'required|unique:beritas',
        'isi' => 'required',
        'sampul' => 'image|max:20048']);
        $berita = Berita::create($request->except('sampul'));
        // isi field sampul jika ada sampul yang diupload
        if ($request->hasFile('sampul')) {
        // Mengambil file yang diupload
        $uploaded_sampul = $request->file('sampul');
        // mengambil extension file
        $extension = $uploaded_sampul->getClientOriginalExtension();
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan sampul ke folder public\img\berita
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/berita';
        $uploaded_sampul->move($destinationPath, $filename);
        // mengisi field sampul di berita dengan filename yang baru dibuat
        $berita->sampul = $filename;
        $berita->save();
        }

        return redirect()->route('berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $berita = Berita::findOrFail($id);
        return view('Berita.edit')->with(compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|unique:beritas,judul,' . $id,            
            'isi' => 'required',
            'sampul' => 'image|max:2048'
            ]);
            $berita = Berita::find($id);
            $berita->update($request->all());
            if ($request->hasFile('sampul')) {
            // menambil sampul yang diupload berikut ekstensinya
            $filename = null;
            $uploaded_sampul = $request->file('sampul');
            $extension = $uploaded_sampul->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/berita';
            // memindahkan file ke folder public/img
            $uploaded_sampul->move($destinationPath, $filename);
            // hapus sampul lama, jika ada
            if ($berita->sampul) {
            $old_sampul = $berita->sampul;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'img/berita'
            . DIRECTORY_SEPARATOR . $berita->sampul;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
            // ganti field sampul dengan sampul yang baru
            $berita->sampul = $filename;
            $berita->save();
            }
            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $berita->judul"
            ]);
            return redirect()->route('berita.index');
        // $this->validate($request, ['judul' => 'required',
        // 'isi' => 'required',
        // 'sampul' => 'image|max:20048']);
        // $berita = Berita::find($id);
        // $berita -> update($request->all());
        // // isi field logo jika ada logo yang diupload
        // if ($request->hasFile('sampul')) {
        // // Mengambil file yang diupload
        // $uploaded_sampul = $request->file('sampul');
        // // mengambil extension file
        // $extension = $uploaded_sampul->getClientOriginalExtension();
        // // membuat nama file random berikut extension
        // $filename = md5(time()) . '.' . $extension;
        // // menyimpan sampul ke folder public\img\berita
        // $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/berita';
        // $uploaded_sampul->move($destinationPath, $filename);
        // // mengisi field sampul di berita dengan filename yang baru dibuat
        // $berita->sampul = $filename;
        // $berita->save();
        // }
        // return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        // hapus sampul lama, jika ada
        if ($berita->sampul) {
        $old_sampul = $berita->sampul;
        $filepath = public_path() . DIRECTORY_SEPARATOR . 'img/berita'
        . DIRECTORY_SEPARATOR . $berita->sampul;
        try {
        File::delete($filepath);
        } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
        }
        }
        $berita->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Buku berhasil dihapus"
        ]);
        return redirect()->route('berita.index');
    }
}
