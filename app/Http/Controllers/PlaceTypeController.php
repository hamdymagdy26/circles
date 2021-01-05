<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceTypeFormRequest;
use App\Http\Resources\PlaceTypeResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\PlaceTypeService;
use Dev\Infrastructure\Models\PlaceType;

/**
 * Class PlaceTypeController
 * @package App\Http\Controllers
 */
class PlaceTypeController extends Controller
{
    /**
     * @var PlaceTypeService $placeTypeService
     */
    private $placeTypeService;

    /**
     * PlaceTypeController constructor.
     * @param PlaceTypeService $placeTypeService
     */
    public function __construct(PlaceTypeService $placeTypeService)
    {
        $this->placeTypeService = $placeTypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $placeTypes = $this->placeTypeService->index();
        return PlaceTypeResource::collection($placeTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PlaceTypeFormRequest $request
     * @return PlaceTypeResource
     */
    public function store(PlaceTypeFormRequest $request)
    {
        $placeType = $this->placeTypeService->create($request->validated());
        return (new PlaceTypeResource($placeType))
            ->additional(ResponseType::simpleResponse('PlaceType has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  PlaceType $placeType
     * @return PlaceTypeResource
     */
    public function show(PlaceType $placeType)
    {
        $placeType = $this->placeTypeService->show($placeType->id);
        return new PlaceTypeResource($placeType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PlaceTypeFormRequest $request
     * @param  PlaceType $placeType
     * @return PlaceTypeResource
     */
    public function update(PlaceTypeFormRequest $request, PlaceType $placeType)
    {
        $placeType = $this->placeTypeService->update($placeType->id, $request->validated());
        return (new PlaceTypeResource($placeType))->additional(ResponseType::simpleResponse('PlaceType has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PlaceType $placeType
     * @return PlaceTypeResource
     */
    public function destroy(PlaceType $placeType)
    {
        $this->placeTypeService->delete($placeType);
        return new PlaceTypeResource(ResponseType::simpleResponse('PlaceType has been deleted', true));
    }
}
