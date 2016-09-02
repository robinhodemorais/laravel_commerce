<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class OrderRequest extends Request
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
     * {@inheritdoc}
     */
    protected function formatErrors(Validator $validator)
    {
        $messages = [
            'required' => 'Por favor preencha todos os campos.',
        ];
        return $validator->errors()->all($messages);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => 'required'
        ];
    }
}
