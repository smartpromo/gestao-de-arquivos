<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicosRequest extends FormRequest
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
            'nome' => 'required',
            'email' => 'required|email',
            'especialidade' => 'required',
            'crm' => 'max:2147483647|required|numeric',
            'uf_do_crm' => 'required',
            'rg' => 'max:2147483647|nullable|numeric',
        ];
    }
}
