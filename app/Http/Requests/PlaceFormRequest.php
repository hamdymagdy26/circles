<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PlaceFormRequest extends AbstractFormRequest
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
                    'image' => 'required',
                    'longitude' => 'required',
                    'latitude' => 'required',
                    'type_id' => 'required|numeric',
                ];
            }
        }
        if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    'name' => 'required',
                    'image' => 'required',
                    'longitude' => 'required',
                    'latitude' => 'required',
                    'type_id' => 'required|numeric',
                ];
            }
        }
        return [];
    }
}
