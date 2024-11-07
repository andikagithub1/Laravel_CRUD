<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departemen = Departemen::all();
        return view('departemen.index', ['departemen'=>$departemen]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('departemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_departemen' => 'required',
        ]);
        Departemen::create([
            'nama_departemen' =>$request->nama_departemen,
        ]);

        return redirect('departemen')->with('success','Departemen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departemen $departemen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departemen $departemen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try{
        Departemen::where('kodedepartemen',$id)->delete();
        return redirect('departemen')->with('success','Departemen Berhasil Dihapus');
        } catch (\Exception $e) {
            Log::error('Error Menghapus departemen:'.$e->getMessage());
            return redirect('departemen')->with('error','Terjadi kesalahan saat menghapus departemen');
        }
    }
}
