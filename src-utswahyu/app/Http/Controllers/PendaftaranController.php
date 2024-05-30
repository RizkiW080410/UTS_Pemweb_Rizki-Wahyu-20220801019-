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
            'transkrip_nilai' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('transkrip_nilai');

        if ($request->hasFile('transkrip_nilai')) {
            $file = $request->file('transkrip_nilai');
            $path = $file->store('transkrip_nilai', 'public');
            $data['transkrip_nilai'] = $path;
        }

        $data['beasiswa_id'] = $id;

        Pendaftaran::create($data);

        return redirect()->route('beasiswa.show', $id)->with('success', 'Pendaftaran berhasil!');
    }
}
