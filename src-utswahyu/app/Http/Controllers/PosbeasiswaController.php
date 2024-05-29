<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Gallery;
use Illuminate\Http\Request;

class PosbeasiswaController extends Controller
{
    public function index()
    {
        $beasiswas = Beasiswa::all();
        $galleris = Gallery::all();
        return view('beasiswa.cartbeasiswa', compact('beasiswas', 'galleris'));
    }

    public function show($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('beasiswa.detail', compact('beasiswa'));
    }
}
