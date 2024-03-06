<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{

    public function authenticate(Request $request)
    {
        // dd('awd');

        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role_id == 3) {
                return redirect()->route('rekrutmen.index');
            } else {
                return redirect()->route('dashboard.index');
            }
        } else {
            // dd('awd');
            return redirect()->route('login')->with('fail', 'Email atau Password salah');
        }
    }
    public function logout(Request $request)
    {
        auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login.login');
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
        //
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

    public function registrasi()
    {
        return view('auth.registrasi.registrasi');
    }
    public function registrasiStore(Request $request)
    {
        // dd('awdawd');
        $data = [
            'nama' => 'required|max:255',
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:3', 'max:255'],
            'passwordulangi' => ['required', 'min:3', 'max:255'],
        ];
        $validatedData = $request->validate($data);



        if ($validatedData['password'] ===  $validatedData['passwordulangi']) {
            $validatedData['role_id'] = 3;
            $validatedData['password'] = Hash::make($validatedData['password']);
            User::create($validatedData);
            // dd($validatedData);
            return redirect()->route('beranda')
                ->with('success', 'Selamat Anda Berhasil Mendaftar, Login dan Lengkapi Data');
        } else {
            return redirect()->route('registrasi')->with('fail', 'Password Tidak Sama');
        }

        return view('auth.registrasi.registrasi');
    }
    public function showpdf()
    {
        $pathToFile = 'pdf\acara.pdf';

        // Set header Content-Disposition
        header('Content-Disposition: attachment; filename="acara.pdf"');

        // Kirim file sebagai respons
        return response()->file($pathToFile);
    }
}
