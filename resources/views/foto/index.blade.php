@extends('layout')

@section('content')
<h1>Foto</h1>
    <a href="{{ route('foto.create') }}" class="tambah-button">+ Tambah</a>
    <br>
    <br>
    <table border="4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Album</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Unggah</th>
                <th>Lokasi File</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1
            @endphp
            @forelse($fotos as $foto)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $foto->album->nama_album }}</td>
                    <td>{{ $foto->judul }}</td>
                    <td>{{ $foto->deskripsi }}</td>
                    <td>{{ date("d-m-Y", strtotime($foto->tanggal_unggah)) }}</td>
                    <td><img src="{{ asset("storage/{$foto->lokasi_file}") }}" alt="{{ $foto->judul }}" width="40%"</td>
                    <td>
                        <a href="{{ url('/foto/' . $foto->id) }}" class="edit-button">Edit</a>
                        ||
                        <form action="{{ url('/foto/' . $foto->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak terdapat data foto!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

 



                                                        <!-- W=Fonzz -->
    