<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WaliNikahRequest extends FormRequest
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
        return [
            'nama_wali' => 'required',
            'tgl_lahir_wali' => 'required_if:hubungan_wali,nasab',
            'pekerjaan_wali' => 'required_if:hubungan_wali,nasab',
            'status_wali' => 'required|in:nasab,hakim',
            'nik_nip_wali' => 'required_if:hubungan_wali,nasab',
            'hubungan_wali' => 'required_if:hubungan_wali,nasab',
            'alasan_wali_hakim' => 'required_if:hubungan_wali,hakim',
            'tmpt_lahir_wali' => 'required_if:hubungan_wali,nasab',
            'nama_ayah_wali' => 'required_if:hubungan_wali,nasab'
        ];
    }

    public function messages()
    {
        return [
            'nama_wali.required' => 'nama wali wajib di isi',
            'tgl_lahir_wali.required_if' => 'tanggal lahir wajib di isi',
            'pekerjaan_wali.required_if' => 'pekerjaan wajib di isi',
            'status_wali.required_if' => 'status wali wajib di isi',
            'nik_nip_wali.required_if' => 'nik / nip wajib di isi',
            'hubungan_wali.required_if' => 'hubungan wali wajib di isi',
            'alasan_wali_hakim.required_if' => 'alasan wali hakim wajib di isi',
            'tmpt_lahir_wali.required_if' => 'tempat lahir wajib di isi',
            'nama_ayah_wali.required_if' => 'nama ayah wajib di isi'
        ];
    }
}
