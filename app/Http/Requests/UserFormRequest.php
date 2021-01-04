<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserFormRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        $method = $request->getMethod();
        $actionName = $request->route()->getActionMethod();
        if ($method == 'POST') {
            if ($actionName == 'register') {
                return [
                    'name' => ['required', Rule::unique('places', 'name')->whereNull('deleted_at')],
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:4',
                ];
            }
        }
        if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|min:4',
                ];
            }
        }
        return [];
    }
}
