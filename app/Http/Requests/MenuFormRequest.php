<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class MenuFormRequest extends AbstractFormRequest
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
                    'name' => ['required', Rule::unique('places', 'name')->whereNull('deleted_at')],
                    'place_id' => 'required|numeric|exists:places,id'
                ];
            }
        }
        if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    'name' => 'required',
                    'place_id' => 'required|numeric|exists:places,id'
                ];
            }
        }
        return [];
    }
}
