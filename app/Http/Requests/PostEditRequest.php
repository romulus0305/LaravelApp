<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostEditRequest extends Request
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

            'title'=>'required',
            'category_id'=>'required',
            'body'=>'required',
        ];
    }
}



// BadMethodCallException in Validator.php - Method [validateRequred] does not exist. 
// ako se ovo pojavi verovatno je greska u pravopisu reqred

