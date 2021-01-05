<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CircleFormRequest extends AbstractFormRequest
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
            if ($actionName == 'store') {
                return [
                    'name' => ['required', Rule::unique('circles', 'name')->whereNull('deleted_at')],
                    'circle_users' => 'array',
                    'circle_users.*' => 'numeric|exists:users,id'
                ];
            }
        }
        if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    'name' => 'required',
                    'circle_users' => 'array',
                    'circle_users.*' => 'numeric|exists:users,id'
                ];
            }
        }
        return [];
    }
}
