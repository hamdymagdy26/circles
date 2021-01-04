<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceFormRequest;
use App\Http\Resources\PlaceResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\PlaceService;
use Dev\Infrastructure\Models\Place;

/**
 * Class PlaceController
 * @package App\Http\Controllers
 */
class PlaceController extends Controller
{
    /**
     * @var PlaceService $placeService
     */
    private $placeService;

    /**
     * PlaceController constructor.
     * @param PlaceService $placeService
     */
    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $places = $this->placeService->index();
        return PlaceResource::collection($places);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PlaceFormRequest $request
     * @return PlaceResource
     */
    public function store(PlaceFormRequest $request)
    {
        $place = $this->placeService->create($request->validated());
        return (new PlaceResource($place))
            ->additional(ResponseType::simpleResponse('Place has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  Place $place
     * @return PlaceResource
     */
    public function show(Place $place)
    {
        $place = $this->placeService->show($place->id);
        return new PlaceResource($place);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PlaceFormRequest $request
     * @param  Place $place
     * @return PlaceResource
     */
    public function update(PlaceFormRequest $request, Place $place)
    {
        $place = $this->placeService->update($place->id, $request->validated());
        return (new PlaceResource($place))->additional(ResponseType::simpleResponse('Place has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Place $place
     * @return PlaceResource
     */
    public function destroy(Place $place)
    {
        $this->placeService->delete($place);
        return new PlaceResource(ResponseType::simpleResponse('Place has been deleted', true));
    }
}
