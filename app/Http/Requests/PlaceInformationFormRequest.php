<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PlaceInformationFormRequest extends AbstractFormRequest
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
                    'place_id' => 'numeric|exists:places,id',
                    'seat_type' => 'numeric',
                    'seatNumber' => 'numeric',
                    'pricePerSeat' => 'numeric',
                    'seatLevel' => 'numeric'
                ];
            }
        }
        if ($method == 'PUT') {
            if ($actionName == 'update') {
                return [
                    'seat_type' => 'numeric',
                    'place_id' => 'numeric|exists:places,id',
                    'seatNumber' => 'numeric',
                    'pricePerSeat' => 'numeric',
                    'seatLevel' => 'numeric'
                ];
            }
        }
        return [];
    }
}
