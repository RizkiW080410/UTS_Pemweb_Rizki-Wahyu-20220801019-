<?php

namespace App\Http\Requests;

use App\Models\Beasiswa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBeasiswaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beasiswa_create');
    }

    public function rules()
    {
        return [
            'name_beasiswa' => [
                'string',
                'required',
            ],
            'pembuat' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'start_beasiswa' => [
                'date',
                'required',
            ],
            'finish_beasiswa' => [
                'date',
                'required',
            ],
        ];
    }
}
