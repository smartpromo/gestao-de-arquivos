<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuiasRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'medico_id' => 'required',
            'nome_do_pacinte' => 'required',
            'convenio_id' => 'required',
            'horario_inicial' => 'nullable|date_format:H:i:s',
            'horario_final' => 'nullable|date_format:H:i:s',
            'local_address'=>'required',
            'local_latitude'=>'required',
            'local_longitude'=>'required',
            'via' => 'required',
            'guia' => 'required',
        ];
    }
}
