<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pertanyaan = Question::whereNotIn('id', function ($query) {
            $query->select('question_id')
                ->from('answers')
                ->where('id', auth()->id()); // Assuming 'id' column in 'answers' table is the user ID
        })->with('answers')->first();


        // Redirect jika tidak ada pertanyaan yang tersedia
        if (!$pertanyaan) {
            return redirect()->route('ujian.selesai')->with('info', 'Anda sudah menjawab semua pertanyaan.');
        }


        return view('dashboard.CAT.Answer', compact('pertanyaan'));
    }
    public function jawab(Request $request)
    {
        // Validasi data yang dikirimkan oleh formulir
        $validatedData = $request->validate([
            'pertanyaan_id' => 'required|exists:questions,id',
            'jawaban' => 'required|exists:answers,id',
        ]);

        // Simpan jawaban peserta
        $jawaban = new Answer();
        $jawaban->question_id = $validatedData['pertanyaan_id'];
        $jawaban->id = $validatedData['jawaban'];
        $jawaban->id = auth()->id();
        $jawaban->save();

        return redirect()->route('ujian1.index')->with('success', 'Jawaban berhasil disimpan!');
    }

    public function selesai()
    {
        // Tampilkan halaman ujian selesai
        // return view('ujian.selesai');
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
    public function store(StoreAnswerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
