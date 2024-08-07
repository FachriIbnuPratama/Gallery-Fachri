@extends('layout')

@section('content')
<center>
<h1>Foto</h1>
    <a href="{{ route('foto.create') }}" class="tambah-button">+ Tambah</a>
    <br>
    <br>
    <table border="4">
    <thead>
        <tr>
            <th>No</th>
            <th>Album</th>
            <th>Judul</th>
            <th>Deskripsi Foto</th>
            <th>Tanggal diUnggah</th>
            <th>Foto</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fotos as $foto)
        <tr>
            <td>{{ $foto->no++ }}</td>
            <td>{{ $foto->album->nama_album }}</td>
            <td>{{ $foto->judul }}</td>
            <td>{{ $foto->deskripsi }}</td>
            <td>{{ $foto->tanggal_unggah }}</td>
            <td><img src="{{ asset("storage/{$foto->lokasi_file}") }}" alt="{{ $foto->judul }}" width="100" /></td>
            <td>
                <a href="{{ route('foto.edit', $foto->id) }}">Edit</a>
                <form action="{{ route('foto.destroy', $foto->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</center>
@endsection

 



                                                        <!-- W=Fonzz -->
    