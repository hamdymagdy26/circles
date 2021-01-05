<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class FavouriteFormRequest extends AbstractFormRequest
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
                    'place_id' => 'required|numeric|exists:places,id',
                    'user_id' => 'required|numeric|exists:users,id',
                ];
            }
        }
        if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    'place_id' => 'required|numeric|exists:places,id',
                    'user_id' => 'required|numeric|exists:users,id',
                ];
            }
        }
        return [];
    }
}
