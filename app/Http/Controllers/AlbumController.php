<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $nama_album = $request->nama_album;
        $deskripsi  = $request->deskripsi;

        $insertAlbum                 = new Album();
        $insertAlbum->nama_album     = $nama_album;   
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
        $album = Album::where("id", $id)->first();

        $data = [
            "album" => $album,
        ];

        return view("albums.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $nama_album     = $request->nama_album;
        $deskripsi      = $request->deskripsi;
        $tanggal_dibuat = $request->tanggal_dibuat;
    
        $updateAlbum                 =  [
            "nama_album"              => $nama_album,
            "deskripsi"               => $deskripsi,
            "tanggal_dibuat"          => $tanggal_dibuat,
        ];

        Album::where("id","=", $id)->update($updateAlbum);
    
        return redirect()->route('album.index');
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
