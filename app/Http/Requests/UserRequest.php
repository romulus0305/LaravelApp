<?php
/* 

Forcing A Unique Rule To Ignore A Given ID:

Sometimes, you may wish to ignore a given ID during the unique check. For example, consider an "update profile" screen that includes the user's name, e-mail address, and location. Of course, you will want to verify that the e-mail address is unique. However, if the user only changes the name field and not the e-mail field, you do not want a validation error to be thrown because the user is already the owner of the e-mail address. You only want to throw a validation error if the user provides an e-mail address that is already used by a different user. To tell the unique rule to ignore the user's ID, you may pass the ID as the third parameter:


'email' => 'unique:users,email_address,'.$user->id
*/

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        'name'=>'required',    
        'role_id'=>'required',
        'is_active'=>'required',
        'email'=>'required',
        'password'=>'required',

        ];
    }
}
