<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan seluruh data mahasiswa.
     */
    public function index(Request $request)
    {
        $mahasiswas = Mahasiswa::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nim', 'like', "%{$search}%")
                    ->orWhere('nama_mahasiswa', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Menampilkan form tambah data mahasiswa.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan data mahasiswa baru.
     */
    public function store(Request $request)
    {
        $validated = $this->validateMahasiswa($request);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail data mahasiswa.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Menampilkan form edit data mahasiswa.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Memperbarui data mahasiswa.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $this->validateMahasiswa($request, $mahasiswa->id);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Menghapus data mahasiswa.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    /**
     * Validasi input form mahasiswa.
     */
    private function validateMahasiswa(Request $request, $id = null): array
    {
        return $request->validate([
            'nim' => ['required', 'string', 'max:20', 'unique:mahasiswas,nim,' . $id],
            'nama_mahasiswa' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'alamat' => ['required', 'string'],
            'program_studi' => ['required', 'string', 'max:255'],
            'nomor_hp' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:mahasiswas,email,' . $id],
        ]);
    }
}
