<?php

namespace App\Http\Controllers;

use App\Http\Requests\KitchenCategoryFormRequest;
use App\Http\Resources\KitchenCategoryResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\KitchenCategoryService;
use Dev\Infrastructure\Models\KitchenCategory;

/**
 * Class KitchenCategoryController
 * @package App\Http\Controllers
 */
class KitchenCategoryController extends Controller
{
    /**
     * @var KitchenCategoryService $kitchenCategoryService
     */
    private $kitchenCategoryService;

    /**
     * KitchenCategoryController constructor.
     * @param KitchenCategoryService $kitchenCategoryService
     */
    public function __construct(KitchenCategoryService $kitchenCategoryService)
    {
        $this->kitchenCategoryService = $kitchenCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $kitchenCategorys = $this->kitchenCategoryService->index();
        return KitchenCategoryResource::collection($kitchenCategorys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  KitchenCategoryFormRequest $request
     * @return KitchenCategoryResource
     */
    public function store(KitchenCategoryFormRequest $request)
    {
        $kitchenCategory = $this->kitchenCategoryService->create($request->validated());
        return (new KitchenCategoryResource($kitchenCategory))
            ->additional(ResponseType::simpleResponse('Kitchen Category has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  KitchenCategory $kitchenCategory
     * @return KitchenCategoryResource
     */
    public function show(KitchenCategory $kitchenCategory)
    {
        $kitchenCategory = $this->kitchenCategoryService->show($kitchenCategory->id);
        return new KitchenCategoryResource($kitchenCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  KitchenCategoryFormRequest $request
     * @param  KitchenCategory $kitchenCategory
     * @return KitchenCategoryResource
     */
    public function update(KitchenCategoryFormRequest $request, KitchenCategory $kitchenCategory)
    {
        $kitchenCategory = $this->kitchenCategoryService->update($kitchenCategory->id, $request->validated());
        return (new KitchenCategoryResource($kitchenCategory))->additional(ResponseType::simpleResponse('Kitchen Category has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  KitchenCategory $kitchenCategory
     * @return KitchenCategoryResource
     */
    public function destroy(KitchenCategory $kitchenCategory)
    {
        $this->kitchenCategoryService->delete($kitchenCategory);
        return new KitchenCategoryResource(ResponseType::simpleResponse('Kitchen Category has been deleted', true));
    }

}