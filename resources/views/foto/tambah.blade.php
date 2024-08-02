@extends('layout')

@section('content')
    <h1>Tambah Hewan</h1>
        <center>
        <a href="{{ route('Fonzz.index') }}" >Kembali ke Tampilan utama</a>
            <form action="{{ route('foto.store') }}" method="post" enctype="multipart/form-date">
            @csrf
            <div>
                <label for="album">Album</label>
                <select name="album" id="album" required="required">
                    <option value="">Pilih Album</option>
                    @foreacth($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->nama_album}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" placeholder="Judul Foto" required>
            </div>
            <div>
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi Foto" required></textarea>
            </div>
            <div>
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" accept="image/*" required>
            </div>
        <button type="submit">Simpan</button>
    </form>
</center>
@endsection


                                                        <!-- W=Fonzz -->
  