@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pendaftaran.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pendaftarans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="fullname">{{ trans('cruds.pendaftaran.fields.fullname') }}</label>
                <input class="form-control {{ $errors->has('fullname') ? 'is-invalid' : '' }}" type="text" name="fullname" id="fullname" value="{{ old('fullname', '') }}">
                @if($errors->has('fullname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fullname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendaftaran.fields.fullname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.pendaftaran.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendaftaran.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.pendaftaran.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendaftaran.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.pendaftaran.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendaftaran.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_lahir">{{ trans('cruds.pendaftaran.fields.tanggal_lahir') }}</label>
                <input class="form-control datetime {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}" type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                @if($errors->has('tanggal_lahir'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_lahir') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendaftaran.fields.tanggal_lahir_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tempat_lahir">{{ trans('cruds.pendaftaran.fields.tempat_lahir') }}</label>
                <input class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', '') }}" required>
                @if($errors->has('tempat_lahir'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tempat_lahir') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendaftaran.fields.tempat_lahir_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="NIK">{{ trans('cruds.pendaftaran.fields.NIK') }}</label>
                <input class="form-control {{ $errors->has('NIK') ? 'is-invalid' : '' }}" type="number" name="NIK" id="NIK" value="{{ old('NIK', '') }}" step="0.01" required>
                @if($errors->has('NIK'))
                    <div class="invalid-feedback">
                        {{ $errors->first('NIK') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendaftaran.fields.NIK_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nilai">{{ trans('cruds.pendaftaran.fields.nilai') }}</label>
                <input class="form-control {{ $errors->has('nilai') ? 'is-invalid' : '' }}" type="number" name="nilai" id="nilai" value="{{ old('nilai', '') }}" step="0.01" required>
                @if($errors->has('nilai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nilai') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pendaftaran.fields.nilai_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection