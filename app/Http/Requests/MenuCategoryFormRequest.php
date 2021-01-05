<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class MenuCategoryFormRequest extends AbstractFormRequest
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
                    'name' => ['required', Rule::unique('menu_categories', 'name')->whereNull('deleted_at')],
                    'menu_id' => 'required|numeric|exists:menus,id'
                ];
            }
        }
        if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    'name' => 'required',
                    'menu_id' => 'required|numeric|exists:menus,id'
                ];
            }
        }
        return [];
    }
}
