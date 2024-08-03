<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();

        return view("albums.index", compact("albums"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();

        return view("albums.create");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $album      = $request->album;
        $deskripsi  = $request->deskripsi;

        $insertAlbum                 = new Album();
        $insertAlbum->id             = $album;
        $insertAlbum->tanggal_dibuat = date("Y-m-d");

        if (!empty($deskripsi)) {
            $insertAlbum->deskripsi = $deskripsi;
        }
        $insertAlbum->save();

        return redirect()->route("album.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $albums = Album::all();

        $foto = Foto::where("id", "=", $id)->first();

        $data = [
            "albums" => $albums,
            "foto" => $foto,
        ];

        return view("fotos.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $album      = $request->album;
        $judul      = $request->judul;
        $deskripsi  = $request->deskripsi;
    
        $updateFoto                 =  [
            "album_id"        => $album,
            "judul"           => $judul,
        ];

        if (!empty($deskripsi)) {
            $updateFoto["deskripsi"] = $deskripsi;
        }
    
        if ($request->hasFile("foto"))
        {
            $foto = $request->file("foto");
            if ($foto->isValid()) {
                $this->deleteFileFoto($id);
                $namaFotoBaru = date("Y_m_d_H_i_s") .".". $foto->getClientOriginalExtension();
                $foto->storeAs("/foto", $namaFotoBaru, "public");
                $updateFoto["lokasi_file"]="foto/{$namaFotoBaru}";
            }
        }

        Foto::where("id", "=", $id)->update($updateFoto);
    
        return redirect()->route('foto.index')->with('success', 'Foto berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    private function deleteFileFoto(string $id){
        $album = Album::where("id", $id)->first();
    }

    public function destroy(string $id)
    {
        $album = Album::where("id", $id)->first();

        $this->deleteFileFoto($id);

        $album->delete();

        return redirect()->route("album.index");
    }
}
