<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class MenuProductFormRequest extends AbstractFormRequest
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
                    'menu_category_id' => 'required|numeric|exists:menu_categories,id',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'price' => 'required|numeric'
                ];
            }
        }
        if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    'name' => 'required',
                    'menu_category_id' => 'required|numeric|exists:menu_categories,id',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'price' => 'required|numeric'
                ];
            }
        }
        return [];
    }
}
