<?php

namespace App\Http\Controllers;

use App\Models\Rekrutmen;
use App\Http\Requests\StoreRekrutmenRequest;
use App\Http\Requests\UpdateRekrutmenRequest;

class RekrutmenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('awd');
        return view('dashboard.rekrutmen.index'); 
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
    public function store(StoreRekrutmenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rekrutmen $rekrutmen)
    {
        //
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
