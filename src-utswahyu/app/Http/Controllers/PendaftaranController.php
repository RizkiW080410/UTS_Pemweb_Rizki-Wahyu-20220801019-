<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function create($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('formpendaftaran.input', compact('beasiswa'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'NIK' => 'required|string|max:16',
            'nilai' => 'required|numeric',
        ]);

        $pendaftaran = new Pendaftaran($request->all());
        $pendaftaran->save();

        return redirect()->route('beasiswa.show', $id)->with('success', 'Pendaftaran berhasil!');
    }
}
