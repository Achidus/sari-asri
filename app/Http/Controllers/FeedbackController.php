<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul_feedback' => 'required|string|max:255',
            'nama_pengirim'  => 'required|string|max:255',
            'isi_feedback'   => 'required|string',
        ]);

        Feedback::create([
            'judul_feedback' => $request->judul_feedback,
            'nama_pengirim'  => $request->nama_pengirim,
            'isi_feedback'   => $request->isi_feedback,
        ]);

        return response()->json([
            'message' => 'Feedback berhasil dikirim!'
        ]);
    }
}
