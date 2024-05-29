<?php

namespace App\Http\Requests;

use App\Models\Pendaftaran;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePendaftaranRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pendaftaran_edit');
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
                'required|digits:16',
            ],
            'nilai' => [
                'required|numeric|min:0|max:100',
            ],
        ];
    }
}
