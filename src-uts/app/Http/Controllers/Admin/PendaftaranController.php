<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPendaftaranRequest;
use App\Http\Requests\StorePendaftaranRequest;
use App\Http\Requests\UpdatePendaftaranRequest;
use App\Models\Pendaftaran;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PendaftaranController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pendaftaran_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pendaftaran = Pendaftaran::all();

        return view('admin.pendaftarans.index', compact('pendaftaran'));
    }

    public function create()
    {
        abort_if(Gate::denies('pendaftaran_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pendaftarans.create');
    }

    public function store(StorePendaftaranRequest $request)
    {
        $pendaftaran = Pendaftaran::create($request->all());

        return redirect()->route('admin.pendaftarans.index');
    }

    public function edit(Pendaftaran $pendaftaran)
    {
        abort_if(Gate::denies('pendaftaran_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pendaftarans.edit', compact('pendaftaran'));
    }

    public function update(UpdatePendaftaranRequest $request, Pendaftaran $pendaftaran)
    {
        $pendaftaran->update($request->all());

        return redirect()->route('admin.pendaftarans.index');
    }

    public function show(Pendaftaran $pendaftaran)
    {
        abort_if(Gate::denies('pendaftaran_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pendaftarans.show', compact('pendaftaran'));
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        abort_if(Gate::denies('pendaftaran_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pendaftaran->delete();

        return back();
    }

    public function massDestroy(MassDestroyPendaftaranRequest $request)
    {
        $pendaftarans = Pendaftaran::find(request('ids'));

        foreach ($pendaftarans as $pendaftaran) {
            $pendaftaran->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
