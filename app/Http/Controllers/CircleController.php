<?php

namespace App\Http\Controllers;

use App\Http\Requests\CircleFormRequest;
use App\Http\Resources\CircleResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\CircleService;
use Dev\Infrastructure\Models\Circle;

/**
 * Class CircleController
 * @package App\Http\Controllers
 */
class CircleController extends Controller
{
    /**
     * @var CircleService $circleService
     */
    private $circleService;

    /**
     * CircleController constructor.
     * @param CircleService $circleService
     */
    public function __construct(CircleService $circleService)
    {
        $this->circleService = $circleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $circles = $this->circleService->index();
        return CircleResource::collection($circles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CircleFormRequest $request
     * @return CircleResource
     */
    public function store(CircleFormRequest $request)
    {
        $circle = $this->circleService->create($request->validated());
        return (new CircleResource($circle))
            ->additional(ResponseType::simpleResponse('Circle has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  Circle $circle
     * @return CircleResource
     */
    public function show(Circle $circle)
    {
        $circle = $this->circleService->show($circle->id);
        return new CircleResource($circle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CircleFormRequest $request
     * @param  Circle $circle
     * @return CircleResource
     */
    public function update(CircleFormRequest $request, Circle $circle)
    {
        $circle = $this->circleService->update($circle->id, $request->validated());
        return (new CircleResource($circle))->additional(ResponseType::simpleResponse('Circle has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Circle $circle
     * @return CircleResource
     */
    public function destroy(Circle $circle)
    {
        $this->circleService->delete($circle);
        return new CircleResource(ResponseType::simpleResponse('Circle has been deleted', true));
    }
}
