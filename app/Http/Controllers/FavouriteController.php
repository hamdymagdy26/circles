<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavouriteFormRequest;
use App\Http\Resources\FavouriteResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\FavouriteService;
use Dev\Infrastructure\Models\Favourite;

/**
 * Class FavouriteController
 * @package App\Http\Controllers
 */
class FavouriteController extends Controller
{
    /**
     * @var FavouriteService $favouriteService
     */
    private $favouriteService;

    /**
     * FavouriteController constructor.
     * @param FavouriteService $favouriteService
     */
    public function __construct(FavouriteService $favouriteService)
    {
        $this->favouriteService = $favouriteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $favourites = $this->favouriteService->index();
        return FavouriteResource::collection($favourites);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FavouriteFormRequest $request
     * @return FavouriteResource
     */
    public function store(FavouriteFormRequest $request)
    {
        $favourite = $this->favouriteService->create($request->validated());
        return (new FavouriteResource($favourite))
            ->additional(ResponseType::simpleResponse('Favourite has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  Favourite $favourite
     * @return FavouriteResource
     */
    public function show(Favourite $favourite)
    {
        $favourite = $this->favouriteService->show($favourite->id);
        return new FavouriteResource($favourite);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FavouriteFormRequest $request
     * @param  Favourite $favourite
     * @return FavouriteResource
     */
    public function update(FavouriteFormRequest $request, Favourite $favourite)
    {
        $favourite = $this->favouriteService->update($favourite->id, $request->validated());
        return (new FavouriteResource($favourite))->additional(ResponseType::simpleResponse('Favourite has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Favourite $favourite
     * @return FavouriteResource
     */
    public function destroy(Favourite $favourite)
    {
        $this->favouriteService->delete($favourite);
        return new FavouriteResource(ResponseType::simpleResponse('Favourite has been deleted', true));
    }
}
