<?php

namespace App\Http\Controllers;

use App\Models\Rekrutmen;
use App\Http\Requests\StoreRekrutmenRequest;
use App\Http\Requests\UpdateRekrutmenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RekrutmenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('awd');
        $rekrutmen = Rekrutmen::latest()->get();
        return view('dashboard.admin.index', [
            'rekrutmens' => $rekrutmen
        ]);
    }
    public function profile()
    {
        // dd('awd');
        $rekrutmen = Rekrutmen::latest()->get();
        return view('dashboard.rekrutmen.profile', [
            'rekrutmens' => $rekrutmen
        ]);
    }
    public function saveprofile(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => ['nullable'],
            'email' => ['nullable'],
            'nik' => ['nullable'],
            'nohp' => ['nullable'],
            'alamatktp' => ['nullable'],
            'alamatdomisili' => ['nullable'],
            'lamaran' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'ijasa' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'pernyataan' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'cv' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'ktp' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'sim' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'npwp' => ['file', 'max:5120', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
        ]);
        // dd($validatedData);

        DB::beginTransaction();
        try {

            if ($request->hasFile('lamaran')) {
                $file = $request->file('lamaran');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['lamaran'] = $path;
            }
            if ($request->hasFile('ijasa')) {
                $file = $request->file('ijasa');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['ijasa'] = $path;
            }
            if ($request->hasFile('pernyataan')) {
                $file = $request->file('pernyataan');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['pernyataan'] = $path;
            }
            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['cv'] = $path;
            }
            if ($request->hasFile('ktp')) {
                $file = $request->file('ktp');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['ktp'] = $path;
            }
            if ($request->hasFile('sim')) {
                $file = $request->file('sim');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['sim'] = $path;
            }
            if ($request->hasFile('npwp')) {
                $file = $request->file('npwp');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['npwp'] = $path;
            }



            Rekrutmen::create($validatedData);
            // dd($validatedData);


            DB::commit();
            return redirect('/dashboard')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('fail', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('ini create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRekrutmenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rekrutmen = Rekrutmen::findOrFail($id);
        return view('dashboard.admin.show', [
            'rekrutmen' => $rekrutmen
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rekrutmen $rekrutmen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRekrutmenRequest $request, Rekrutmen $rekrutmen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rekrutmen $rekrutmen)
    {
        //
    }
}
