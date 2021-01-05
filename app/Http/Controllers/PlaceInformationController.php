<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceInformationFormRequest;
use App\Http\Resources\PlaceInformationResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\PlaceInformationService;
use Dev\Infrastructure\Models\PlaceInformation;

/**
 * Class PlaceInformationController
 * @package App\Http\Controllers
 */
class PlaceInformationController extends Controller
{
    /**
     * @var PlaceInformationService $placeInformationService
     */
    private $placeInformationService;

    /**
     * PlaceInformationController constructor.
     * @param PlaceInformationService $placeInformationService
     */
    public function __construct(PlaceInformationService $placeInformationService)
    {
        $this->placeInformationService = $placeInformationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $placeInformations = $this->placeInformationService->index();
        return PlaceInformationResource::collection($placeInformations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PlaceInformationFormRequest $request
     * @return PlaceInformationResource
     */
    public function store(PlaceInformationFormRequest $request)
    {
        $placeInformation = $this->placeInformationService->create($request->validated());
        return (new PlaceInformationResource($placeInformation))
            ->additional(ResponseType::simpleResponse('PlaceInformation has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  PlaceInformation $placeInformation
     * @return PlaceInformationResource
     */
    public function show(PlaceInformation $placeInformation)
    {
        $placeInformation = $this->placeInformationService->show($placeInformation->id);
        return new PlaceInformationResource($placeInformation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PlaceInformationFormRequest $request
     * @param  PlaceInformation $placeInformation
     * @return PlaceInformationResource
     */
    public function update(PlaceInformationFormRequest $request, PlaceInformation $placeInformation)
    {
        $placeInformation = $this->placeInformationService->update($placeInformation->id, $request->validated());
        return (new PlaceInformationResource($placeInformation))->additional(ResponseType::simpleResponse('PlaceInformation has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PlaceInformation $placeInformation
     * @return PlaceInformationResource
     */
    public function destroy(PlaceInformation $placeInformation)
    {
        $this->placeInformationService->delete($placeInformation);
        return new PlaceInformationResource(ResponseType::simpleResponse('PlaceInformation has been deleted', true));
    }
}
