<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Kirim pesan atau simpan di database
        // Misalnya, kirim email atau simpan ke tabel kontak

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
    }
}