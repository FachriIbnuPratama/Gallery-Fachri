@extends('layout')

@section('content')
<center>
<h1>Album</h1>
    <a href="{{ route('album.create') }}" class="tambah-button">+ Tambah</a>
    <br>
    <br>
    <table border="4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Album</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1
            @endphp
            @forelse($album as $a)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->deskripsi }}</td>
                    <td>{{ date("d-m-Y", strtotime($a->tanggal_dibuat)) }}</td>
                    <td>
                        <a href="{{ route('album.edit', $a->id) }}" class="edit-button">Edit</a>
                        ||
                        <form action="{{ route('album.destroy', $a->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak terdapat data album!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</center>
@endsection

 



                                                        <!-- W=Fonzz -->
    