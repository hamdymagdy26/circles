<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class KitchenCategoryFormRequest extends AbstractFormRequest
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
                    'name_ar' => ['required', Rule::unique('kitchen_categories', 'name_ar')->whereNull('deleted_at')],
                    'name_en' => ['required', Rule::unique('kitchen_categories', 'name_en')->whereNull('deleted_at')],
                ];
            }
        }
        if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    'name_ar' => 'sometimes|required|string',
                    'name_en' => 'sometimes|required|string',
                ];
            }
        }
        return [];
    }
}