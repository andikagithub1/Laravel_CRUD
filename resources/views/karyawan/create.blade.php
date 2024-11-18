@extends('layouts.app')

@section('content')
    <h1>Tambah Karyawan</h1>
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama_karyawan">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gaji_karyawan">Gaji Karyawan</label>
            <input type="number" name="gaji_karyawan" id="gaji_karyawan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection
