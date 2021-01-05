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
                    'place_type_id' => 'required|numeric|exists:place_types,id',
                    'tags' => 'array',
                    'tags.*' => 'numeric|exists:tags,id',
                    'placeInformation' => 'array',
                    'placeInformation.*.place_id' => 'numeric|exists:places,id',
                    'placeInformation.*.seat_type' => 'numeric',
                    'placeInformation.*.seatNumber' => 'numeric',
                    'placeInformation.*.pricePerSeat' => 'numeric',
                    'placeInformation.*.seatLevel' => 'numeric'
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
                    'place_type_id' => 'required|numeric|exists:place_types,id',
                    'tags' => 'array',
                    'tags.*' => 'numeric|exists:tags,id',
                    'placeInformation' => 'array',
                    'placeInformation.*.place_id' => 'numeric|exists:places,id',
                    'placeInformation.*.seat_type' => 'numeric',
                    'placeInformation.*.seatNumber' => 'numeric',
                    'placeInformation.*.pricePerSeat' => 'numeric',
                    'placeInformation.*.seatLevel' => 'numeric'
                ];
            }
        }
        return [];
    }
}
