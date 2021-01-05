<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRateFormRequest;
use App\Http\Resources\PlaceRateResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\PlaceRateService;
use Dev\Infrastructure\Models\PlaceRate;

/**
 * Class PlaceRateController
 * @package App\Http\Controllers
 */
class PlaceRateController extends Controller
{
    /**
     * @var PlaceRateService $placeRateService
     */
    private $placeRateService;

    /**
     * PlaceRateController constructor.
     * @param PlaceRateService $placeRateService
     */
    public function __construct(PlaceRateService $placeRateService)
    {
        $this->placeRateService = $placeRateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $placeRates = $this->placeRateService->index();
        return PlaceRateResource::collection($placeRates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PlaceRateFormRequest $request
     * @return PlaceRateResource
     */
    public function store(PlaceRateFormRequest $request)
    {
        $placeRate = $this->placeRateService->create($request->validated());
        return (new PlaceRateResource($placeRate))
            ->additional(ResponseType::simpleResponse('PlaceRate has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  PlaceRate $placeRate
     * @return PlaceRateResource
     */
    public function show(PlaceRate $placeRate)
    {
        $placeRate = $this->placeRateService->show($placeRate->id);
        return new PlaceRateResource($placeRate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PlaceRateFormRequest $request
     * @param  PlaceRate $placeRate
     * @return PlaceRateResource
     */
    public function update(PlaceRateFormRequest $request, PlaceRate $placeRate)
    {
        $placeRate = $this->placeRateService->update($placeRate->id, $request->validated());
        return (new PlaceRateResource($placeRate))->additional(ResponseType::simpleResponse('PlaceRate has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PlaceRate $placeRate
     * @return PlaceRateResource
     */
    public function destroy(PlaceRate $placeRate)
    {
        $this->placeRateService->delete($placeRate);
        return new PlaceRateResource(ResponseType::simpleResponse('PlaceRate has been deleted', true));
    }
}
