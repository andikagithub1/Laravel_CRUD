<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', ['karyawan' => $karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:karyawan,nip',
            'nama_karyawan' => 'required',
            'gaji_karyawan' => 'required|numeric',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ], [
            'nip.required' => 'NIP Wajib Diisi',
            'nama_karyawan.required' => 'Nama Karyawan Wajib Diisi',
            'gaji_karyawan.required' => 'Gaji Karyawan Wajib Diisi',
            'alamat.required' => 'Alamat Karyawan Wajib Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Dipilih',
        ]);

        $data = $request->only(['nip', 'nama_karyawan', 'gaji_karyawan', 'alamat', 'jenis_kelamin']);
        Karyawan::create($data);

        return redirect('karyawan')->with('success', 'Karyawan Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Karyawan::where('nip', $id)->first();
        return view('karyawan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required|unique:karyawan,nip,' . $id . ',nip',  // Modify validation to ignore current nip
            'nama_karyawan' => 'required',
            'gaji_karyawan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',  // Validasi untuk Laki-laki atau Perempuan
        ], [
            'nip.required' => 'NIP Wajib Diisi',
            'nama_karyawan.required' => 'Nama Karyawan Wajib Diisi',
            'gaji_karyawan.required' => 'Gaji Karyawan Wajib Diisi',
            'alamat.required' => 'Alamat Karyawan Wajib Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Dipilih',
        ]);

        $data = [
            'nip' => $request->input('nip'),
            'nama_karyawan' => $request->input('nama_karyawan'),
            'gaji_karyawan' => $request->input('gaji_karyawan'),
            'alamat' => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
        ];

        Karyawan::where('nip', $id)->update($data);

        return redirect('karyawan')->with('success', 'Karyawan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Karyawan::where('nip', $id)->delete();

        return redirect('karyawan')->with('success', 'Karyawan Berhasil Dihapus');
    }
}
