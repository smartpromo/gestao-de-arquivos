<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRelatoriosRequest extends FormRequest
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
            'data_inicial' => 'required|date_format:'.config('app.date_format'),
            'data_final' => 'required|date_format:'.config('app.date_format'),
            'relatorio' => 'required',
        ];
    }
}
