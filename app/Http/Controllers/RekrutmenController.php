<?php

namespace App\Http\Controllers;

use App\Models\Rekrutmen;
use App\Http\Requests\StoreRekrutmenRequest;
use App\Http\Requests\UpdateRekrutmenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Barryvdh\Snappy\Facades\SnappyImage;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Spatie\PdfToImage\Pdf;
use Imagick;

class RekrutmenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $rekrutmens = Rekrutmen::where('user_id', $userId)->latest()->first();
        return view('dashboard.rekrutmen.index', [
            'rekrutmens' => $rekrutmens
        ]);
    }
    public function profile()
    {
        $userId = Auth::id();

        $rekrutmens = Rekrutmen::where('user_id', $userId)->latest()->first();

        return view('dashboard.rekrutmen.profile', [
            'rekrutmens' => $rekrutmens
        ]);
    }
    public function saveprofile(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => ['nullable'],
            'user_id' => ['nullable'],
            'email' => ['nullable'],
            'nik' => ['nullable'],
            'nohp' => ['nullable'],
            'alamatktp' => ['nullable'],
            'alamatdomisili' => ['nullable'],
            'lamaran' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'ijasa' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'pernyataan' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'cv' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'ktp' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'sim' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'npwp' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
        ]);
        // dd($validatedData);

        DB::beginTransaction();
        try {
            $rekrutmen = Rekrutmen::where('nik', $validatedData['nik'])->first();

            if ($request->hasFile('lamaran')) {
                $file = $request->file('lamaran');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['lamaran'] = $fileName;
            }
            if ($request->hasFile('ijasa')) {
                $file = $request->file('ijasa');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['ijasa'] = $fileName;
            }
            if ($request->hasFile('pernyataan')) {
                $file = $request->file('pernyataan');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['pernyataan'] = $fileName;
            }
            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['cv'] = $fileName;
            }
            if ($request->hasFile('ktp')) {
                $file = $request->file('ktp');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['ktp'] = $fileName;
            }
            if ($request->hasFile('sim')) {
                $file = $request->file('sim');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['sim'] = $fileName;
            }
            if ($request->hasFile('npwp')) {
                $file = $request->file('npwp');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['npwp'] = $fileName;
            }

            if ($rekrutmen) {
                // Jika data rekrutmen sudah ada, lakukan update
                $rekrutmen->update($validatedData);
            } else {
                // Jika data rekrutmen belum ada, lakukan insert
                $rekrutmen = Rekrutmen::create($validatedData);
            }
            // Rekrutmen::create($validatedData);

            DB::commit();
            return redirect('/rekrutmen')->with('success', 'Data berhasil disimpan.');
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
    public function profileshow()
    {
        $userId = Auth::id();

        $rekrutmens = Rekrutmen::where('user_id', $userId)->latest()->first();

        if (!$rekrutmens) {
            // Tidak ada rekrutmen yang ditemukan, lakukan penanganan kesalahan di sini
            abort(404); // Contoh: Menampilkan halaman 404
        }

        // $nik = $rekrutmens['nik']; // Ini bisa diambil dari model, database, atau nilai dinamis lainnya

        // $pdfFiles = [];

        // if ($nik) {
        //     $namaFiles = [
        //         $rekrutmens['lamaran'],
        //         $rekrutmens['ijasa'],
        //         $rekrutmens['pernyataan'],
        //         $rekrutmens['cv'],
        //         $rekrutmens['ktp']
        //     ];

        //     foreach ($namaFiles as $namaFile) {
        //         if ($namaFile) {
        //             //  $pdfFiles[] = public_path('storage/berkas/' . $nik . '/' . $namaFile);
        //             $pdfFiles[] = storage_path('/app/public/berkas/' . $nik . '/' . $namaFile);
        //         }
        //     }
        // }

        // $base64Images = [];

        // foreach ($pdfFiles as $pdfFile) {
        //     $imgExt = new Imagick();
        //     $imgExt->setResolution(300, 300); // Set resolusi gambar
        //     $imgExt->readImage($pdfFile);

        // Konversi setiap halaman PDF menjadi gambar PNG
        //     foreach ($imgExt as $image) {
        //         $image->setImageFormat('png');
        //         $base64Images[] = 'data:image/png;base64,' . base64_encode($image->getImageBlob());
        //     }
        // }

        return view(' dashboard.rekrutmen.profileShow', [
            'rekrutmens' => $rekrutmens,
            // 'base64Images' => $base64Images
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rekrutmen = Rekrutmen::findOrFail($id);
        return view('dashboard.rekrutmen.EditProfile', [
            'rekrutmens' => $rekrutmen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => ['nullable'],
            // 'user_id' => ['nullable'],
            'email' => ['nullable'],
            'nik' => ['nullable'],
            'nohp' => ['nullable'],
            'alamatktp' => ['nullable'],
            'alamatdomisili' => ['nullable'],
            'lamaran' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'ijasa' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'pernyataan' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'cv' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'ktp' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'sim' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'npwp' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
        ]);

        $rekrutmen = Rekrutmen::findOrFail($id);
        DB::beginTransaction();
        try {
            if ($request->hasFile('lamaran')) {
                if ($rekrutmen->lamaran != null) {
                    Storage::delete($rekrutmen->lamaran);
                }
                $file = $request->file('lamaran');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName);
                $validatedData['lamaran'] = $fileName;
            }
            if ($request->hasFile('ijasa')) {
                if ($rekrutmen->ijasa != null) {
                    Storage::delete($rekrutmen->ijasa);
                }
                $file = $request->file('ijasa');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName);
                $validatedData['ijasa'] = $fileName;
            }
            if ($request->hasFile('pernyataan')) {
                if ($rekrutmen->pernyataan != null) {
                    Storage::delete($rekrutmen->pernyataan);
                }
                $file = $request->file('pernyataan');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName);
                $validatedData['pernyataan'] = $fileName;
            }
            if ($request->hasFile('cv')) {
                if ($rekrutmen->cv != null) {
                    Storage::delete($rekrutmen->cv);
                }
                $file = $request->file('cv');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName);
                $validatedData['cv'] = $fileName;
            }
            if ($request->hasFile('ktp')) {
                if ($rekrutmen->ktp != null) {
                    Storage::delete($rekrutmen->ktp);
                }
                $file = $request->file('ktp');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName);
                $validatedData['ktp'] = $fileName;
            }
            if ($request->hasFile('sim')) {
                if ($rekrutmen->sim != null) {
                    Storage::delete($rekrutmen->sim);
                }
                $file = $request->file('sim');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName);
                $validatedData['sim'] = $fileName;
            }
            if ($request->hasFile('npwp')) {
                if ($rekrutmen->npwp != null) {
                    Storage::delete($rekrutmen->npwp);
                }
                $file = $request->file('npwp');
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName);
                $validatedData['npwp'] = $fileName;
            }

            Rekrutmen::where('id', $id)->update($validatedData);
            DB::commit();
            // dd($validatedData);
            return redirect()->route('profileshow')->with('success', 'Data berhasil diperbaharui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('fail', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rekrutmen $rekrutmen)
    {
        //
    }
}
