<?php

namespace App\Http\Requests;

use App\Models\Pendaftaran;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePendaftaranRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pendaftaran_create');
    }

    public function rules()
    {
        return [
            'fullname' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'tanggal_lahir' => [
                'date',
                'required',
            ],
            'tempat_lahir' => [
                'string',
                'required',
            ],
            'NIK' => [
                'required',
            ],
            'nilai' => [
                'required',
            ],
        ];
    }
}
