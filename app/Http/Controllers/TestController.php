<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Models\Question;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //resources\views\dashboard\CAT\index.blade.php
        $tests = Question::all();
        return view('dashboard.CAT.index', [
            'test' => $tests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.CAT.Question', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestRequest $request)
    {
        // dd("store");
        // Validasi data yang dikirimkan oleh formulir
        $validatedData = $request->validate([
            'question' => 'required|string',
            'options.*' => 'required|string', // Array of options
            'correct_option' => 'required|in:A,B,C,D', // Correct option should be one of A, B, C, D
        ]);

        // Simpan pertanyaan
        $question = Question::create([
            'question' => $validatedData['question'],
        ]);

        // Simpan jawaban untuk pertanyaan tersebut
        foreach ($validatedData['options'] as $key => $option) {
            $isCorrect = $validatedData['correct_option'] == chr(65 + $key); // A is 0, B is 1, C is 2, D is 3
            $question->answers()->create([
                'answer' => $option,
                'is_correct' => $isCorrect,
            ]);
        }

        // Redirect ke halaman yang sesuai
        return redirect()->route('ujian.index')->with('success', 'Question created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);

        return view('dashboard.CAT.EditQuestion', [
            'question' => $question
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestRequest $request, string $id)
    {
        // Validasi data yang dikirimkan oleh formulir
        $validatedData = $request->validate([
            'question' => 'required|string',
            'options.*' => 'required|string', // Array of options
            'correct_option' => 'required|in:A,B,C,D', // Correct option should be one of A, B, C, D
        ]);

        // Temukan pertanyaan berdasarkan ID
        $question = Question::findOrFail($id);

        // Update pertanyaan
        $question->update([
            'question' => $validatedData['question'],
        ]);

        // Hapus semua jawaban terkait pertanyaan ini
        $question->answers()->delete();

        // Simpan kembali jawaban baru
        foreach ($validatedData['options'] as $key => $option) {
            $isCorrect = $validatedData['correct_option'] == chr(65 + $key); // A is 0, B is 1, C is 2, D is 3
            $question->answers()->create([
                'answer' => $option,
                'is_correct' => $isCorrect,
            ]);
        }

        // Redirect ke halaman yang sesuai
        return redirect()->route('ujian.index', $question->id)->with('success', 'Question updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan pertanyaan berdasarkan ID
        $question = Question::findOrFail($id);

        // Hapus pertanyaan dan jawabannya
        $question->delete();

        // Redirect ke halaman yang sesuai
        return redirect()->route('ujian.index')->with('success', 'Question deleted successfully!');
    }
}
