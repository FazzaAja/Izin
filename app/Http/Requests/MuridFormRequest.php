<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MuridFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan_id' => 'required',
            'jk' => 'required',
            'alamat' => 'nullable',
            'phone' => 'nullable',
            'foto' => [
                'nullable',
                'image',
                'mimes:png,jpg,jpeg,svg,gif',
                'max:1024',
            ],
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];

        if($this->getMethod() == "POST")
        {
            $rules += [
                'nisn' => [
                    'digits:10',
                    'numeric',
                    'unique:murid,nisn',
                ],
                'nipd' => [
                    'digits_between:9,15',
                    'numeric',
                    'unique:murid,nipd',
                ],
            ];
        }

        if($this->getMethod() == "PUT")
        {
            $murid = $this->route('murid');
            $rules += [
                'nisn' => [
                    'digits:10',
                    'numeric',
                    Rule::unique('murid')->ignore($murid->id),
                ],
                'nipd' => [
                    'digits_between:9,15',
                    'numeric',
                    Rule::unique('murid')->ignore($murid->id),
                ],
            ];
        }

        return $rules;
    }
}
