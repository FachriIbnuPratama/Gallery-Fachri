@extends('layout')

@section('content')
<center>
    <h1>Edit Album</h1>
        <a href="{{ route('album.index') }}" >Kembali ke Tampilan utama</a>
            <form action="{{ route('album.update', $album->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <label for="album">Album</label>
                <select name="album" id="album" required="required">
                    <option value="">Pilih Album</option>
                        <option value="{{ $album->id }}">{{ $album->nama_album}}</option>
                </select>
            </div>
            <div>
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Album" value="{{ $album->deskripsi }}" required></textarea>
            </div>
                <label for="tanggal_dibuat">Tanggal Dibuat</label>
                <input type="date" name="tanggal" id="tanggal_dibuat" placeholder="Tanggal Dibuat" value="{{ $album->tanggal_dibuat }}" required>
            </div>
        <button type="submit">Simpan</button>
    </form>
</center>
@endsection


                                                        <!-- W=Fonzz -->
  