@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beasiswa.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beasiswas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beasiswa.fields.id') }}
                        </th>
                        <td>
                            {{ $beasiswa->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beasiswa.fields.name_beasiswa') }}
                        </th>
                        <td>
                            {{ $beasiswa->name_beasiswa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beasiswa.fields.pembuat') }}
                        </th>
                        <td>
                            {{ $beasiswa->pembuat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beasiswa.fields.description') }}
                        </th>
                        <td>
                            {{ $beasiswa->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beasiswa.fields.start_beasiswa') }}
                        </th>
                        <td>
                            {{ $beasiswa->start_beasiswa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beasiswa.fields.finish_beasiswa') }}
                        </th>
                        <td>
                            {{ $beasiswa->finish_beasiswa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beasiswa.fields.image') }}
                        </th>
                        <td>
                            @if($beasiswa->image)
                                <a href="{{ $beasiswa->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $beasiswa->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beasiswas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection