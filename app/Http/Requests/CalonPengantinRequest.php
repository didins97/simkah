<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalonPengantinRequest extends FormRequest
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
        $commonRules = [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'status' => 'required',
            'nohp' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'agama' => 'required',
            'email' => 'required',
            'tlahir_ayah' => 'required_unless:status_ayah,1',
            'tlahir_ibu' => 'required_unless:status_ibu,1',
            'tgl_lahir_ayah' => 'required_unless:status_ayah,1',
            'tgl_lahir_ibu' => 'required_unless:status_ibu,1',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat_ayah' => 'required_if:status_ayah,0',
            'alamat_ibu' => 'required_if:status_ibu,0',
            'foto' => 'required',
            'alamat' => 'required',
            // 'status_ayah' => 'required',
            // 'status_ibu' => 'required',
            'pekerjaan_ayah' => 'required_unless:status_ayah,1',
            'pekerjaan_ibu' => 'required_unless:status_ibu,1',
        ];

        return $commonRules;
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama wajib diisi',
            'tempat_lahir.required' => 'tempat lahir wajib diisi',
            'tgl_lahir.required' => 'tanggal lahir wajib diisi',
            'status.required' => 'status wajib diisi',
            'nohp.required' => 'nohp wajib diisi',
            'pekerjaan.required' => 'pekerjaan wajib diisi',
            'agama.required' => 'agama wajib diisi',
            'email.required' => 'email wajib diisi',
            'tlahir_ayah.required_unless' => 'tempat lahir ayah wajib diisi',
            'tlahir_ibu.required_unless' => 'tempat lahir ibu wajib diisi',
            'tgl_lahir_ayah.required_unless' => 'tanggal lahir ayah wajib diisi',
            'tgl_lahir_ibu.required_unless' => 'tanggal lahir ibu wajib diisi',
            'nama_ayah.required' => 'nama ayah wajib diisi',
            'nama_ibu.required' => 'nama ibu wajib diisi',
            'foto.required' => 'foto wajib diisi',
            'umur.required' => 'umur wajib diisi',
            'alamat.required' => 'alamat wajib diisi',
            'pendidikan.required' => 'pendidikan wajib diisi',
            'pekerjaan_ayah.required_unless' => 'pekerjaan ayah wajib diisi',
            'pekerjaan_ibu.required_unless' => 'pekerjaan ibu wajib diisi',
        ];
    }
}
