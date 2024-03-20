<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rekrutmen;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Spatie\PdfToImage\Pdf;
use GdImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Imagick;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekrutmen = Rekrutmen::latest()->get();
        return view('dashboard.admin.dataRekrutmen', [
            'rekrutmens' => $rekrutmen
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $rekrutmens = Rekrutmen::findOrfail($id);

        // if (!$rekrutmens) {
        //     // Tidak ada rekrutmen yang ditemukan, lakukan penanganan kesalahan di sini
        //     abort(404); // Contoh: Menampilkan halaman 404
        // }

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

        //     // Konversi setiap halaman PDF menjadi gambar PNG
        //     foreach ($imgExt as $image) {
        //         $image->setImageFormat('png');
        //         $base64Images[] = 'data:image/png;base64,' . base64_encode($image->getImageBlob());
        //     }
        // }


        return view('dashboard.admin.show', [
            'rekrutmen' => $rekrutmens,
            // 'base64Images' => $base64Images
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
