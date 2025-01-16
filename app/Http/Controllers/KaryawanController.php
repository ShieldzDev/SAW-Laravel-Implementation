<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Services\SAWService;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $sawService;

    public function __construct(SAWService $sawService)
    {
        $this->sawService = $sawService;
    }

    public function index(SAWService $sawService)
    {
        $karyawans = \App\Models\Karyawan::all(); // Semua karyawan
        $results = $sawService->calculate(); // Prediksi menggunakan metode SAW

        return view('karyawans.index', compact('karyawans', 'results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pengalaman_kerja' => 'required|integer|min:0',
            'pendidikan' => 'required|string',
            'umur' => 'required|integer|min:18',
            'kepribadian' => 'required|string|max:255',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan karyawan berdasarkan ID
        $karyawan = Karyawan::findOrFail($id);

        // Hapus karyawan dari database
        $karyawan->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
