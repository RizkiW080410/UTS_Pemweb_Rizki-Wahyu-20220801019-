@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pendaftaran.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pendaftarans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.id') }}
                        </th>
                        <td>
                            {{ $pendaftaran->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.fullname') }}
                        </th>
                        <td>
                            {{ $pendaftaran->fullname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.address') }}
                        </th>
                        <td>
                            {{ $pendaftaran->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.phone') }}
                        </th>
                        <td>
                            {{ $pendaftaran->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.email') }}
                        </th>
                        <td>
                            {{ $pendaftaran->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.tanggal_lahir') }}
                        </th>
                        <td>
                            {!! $pendaftaran->tanggal_lahir !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.tempat_lahir') }}
                        </th>
                        <td>
                            {{ $pendaftaran->tempat_lahir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.NIK') }}
                        </th>
                        <td>
                            {{ $pendaftaran->NIK }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pendaftaran.fields.nilai') }}
                        </th>
                        <td>
                            {{ $pendaftaran->nilai }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pendaftarans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection