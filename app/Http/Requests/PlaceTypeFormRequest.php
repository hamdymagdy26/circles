<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PlaceTypeFormRequest extends AbstractFormRequest
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
                    'name' => ['required', Rule::unique('place_types', 'name')->whereNull('deleted_at')],
                ];
            }
        }
        if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    'name' => 'required',
                ];
            }
        }
        return [];
    }
}
