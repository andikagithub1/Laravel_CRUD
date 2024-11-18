@extends('layouts.app')

@section('content')
    <h1>Data Karyawan</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Gaji</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($karyawan as $item)
                <tr>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama_karyawan }}</td>
                    <td>{{ $item->gaji_karyawan }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>
                        <a href="{{ route('karyawan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('karyawan.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
