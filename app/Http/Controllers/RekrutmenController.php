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
use Illuminate\Support\Facades\File;

class RekrutmenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $rekrutmen = Rekrutmen::latest()->get();
        return view('dashboard.rekrutmen.index', [
            // 'rekrutmens' => $rekrutmen
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
            'nama' => ['required'],
            'user_id' => ['required'],
            'email' => ['required'],
            'nik' => ['required'],
            'nohp' => ['required'],
            'alamatktp' => ['required'],
            'alamatdomisili' => ['required'],
            'lamaran' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'ijasa' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'pernyataan' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'cv' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'ktp' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'sim' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
            'npwp' => ['file', 'max:1024', 'mimetypes:image/jpeg,image/png,image/gif,application/pdf', 'nullable'],
        ]);

        DB::beginTransaction();
        try {
            $rekrutmen = Rekrutmen::where('nik', $validatedData['nik'])->first();

            if ($rekrutmen) {
                // Jika data rekrutmen sudah ada, lakukan update
                $rekrutmen->update($validatedData);

                // Lakukan pembaruan jalur file jika NIK berubah
                if ($rekrutmen->wasChanged('nik')) {
                    $oldPath = storage_path('app/public/berkas/' . $rekrutmen->getOriginal('nik'));
                    $newPath = storage_path('app/public/berkas/' . $validatedData['nik']);

                    // Lakukan pemindahan berkas
                    if (file_exists($oldPath)) {
                        // Pastikan path lama ada sebelum memindahkannya
                        if (!file_exists($newPath)) {
                            // Buat direktori baru jika belum ada
                            mkdir($newPath, 0755, true);
                        }
                        // Pindahkan berkas dari path lama ke path baru
                        File::move($oldPath, $newPath);
                    }
                }
            } else {
                // Jika data rekrutmen belum ada, lakukan insert
                $rekrutmen = Rekrutmen::create($validatedData);
            }

            // Proses penyimpanan file jika diperlukan
            if ($request->hasFile('lamaran')) {
                $file = $request->file('lamaran');
                $fileName = $file->getClientOriginalName(); // Mengambil nama asli file
                $path = $file->storeAs('public/berkas/' . $validatedData['nik'], $fileName); // Simpan file dengan nama asli
                $validatedData['lamaran'] = $fileName;
            }
            // Lakukan hal yang sama untuk file lainnya (ijasa, pernyataan, cv, ktp, sim, npwp)

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

        $nik = $rekrutmens['nik']; // Ini bisa diambil dari model, database, atau nilai dinamis lainnya

        $pdfFiles = [];

        if ($nik) {
            $namaFiles = [
                $rekrutmens['lamaran'],
                $rekrutmens['ijasa'],
                $rekrutmens['pernyataan'],
                $rekrutmens['cv'],
                $rekrutmens['ktp']
            ];

            foreach ($namaFiles as $namaFile) {
                if ($namaFile) {
                    //  $pdfFiles[] = public_path('storage/berkas/' . $nik . '/' . $namaFile);
                    $pdfFiles[] = storage_path('/app/public/berkas/' . $nik . '/' . $namaFile);
                }
            }
        }

        $base64Images = [];

        foreach ($pdfFiles as $pdfFile) {
            $imgExt = new Imagick();
            $imgExt->setResolution(300, 300); // Set resolusi gambar
            $imgExt->readImage($pdfFile);

            // Konversi setiap halaman PDF menjadi gambar PNG
            foreach ($imgExt as $image) {
                $image->setImageFormat('png');
                $base64Images[] = 'data:image/png;base64,' . base64_encode($image->getImageBlob());
            }
        }

        return view(' dashboard.rekrutmen.profileShow', [
            'rekrutmens' => $rekrutmens,
            'base64Images' => $base64Images
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
