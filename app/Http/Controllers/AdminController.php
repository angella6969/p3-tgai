<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rekrutmen;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $rekrutmen = Rekrutmen::latest()->get();
        $rekrutmen = Rekrutmen::latest()->get()->sortBy(function ($rekrutmen) {
            if ($rekrutmen->status == 'Tidak Lolos') {
                return 2;
            } elseif ($rekrutmen->status == 'Lolos') {
                return 1;
            } else {
                return 0;
            }
        });
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
        return view('dashboard.admin.show', [
            'rekrutmen' => $rekrutmens,
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
        $validatedData = $request->validate([
            'status' => ['required'],
        ]);
        Rekrutmen::where('id', $id)->update($validatedData);

        // dd($id);
        return redirect()->route('dashboard.dataRekrutmen')->with('success', 'Data berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function PrintPdf()
    {
        $rekrutmen = Rekrutmen::where('status', 'Lolos')
            ->orderBy('nama', 'asc')
            ->get();

        return view('dashboard.admin.print-pdf', [
            'rekrutmens' => $rekrutmen
        ]);
    }
}
