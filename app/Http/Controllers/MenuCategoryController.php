<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuCategoryFormRequest;
use App\Http\Resources\MenuCategoryResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\MenuCategoryService;
use Dev\Infrastructure\Models\MenuCategory;

/**
 * Class MenuCategoryController
 * @package App\Http\Controllers
 */
class MenuCategoryController extends Controller
{
    /**
     * @var MenuCategoryService $menuCategoryService
     */
    private $menuCategoryService;

    /**
     * MenuCategoryController constructor.
     * @param MenuCategoryService $menuCategoryService
     */
    public function __construct(MenuCategoryService $menuCategoryService)
    {
        $this->menuCategoryService = $menuCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $menuCategorys = $this->menuCategoryService->index();
        return MenuCategoryResource::collection($menuCategorys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MenuCategoryFormRequest $request
     * @return MenuCategoryResource
     */
    public function store(MenuCategoryFormRequest $request)
    {
        $menuCategory = $this->menuCategoryService->create($request->validated());
        return (new MenuCategoryResource($menuCategory))
            ->additional(ResponseType::simpleResponse('MenuCategory has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  MenuCategory $menuCategory
     * @return MenuCategoryResource
     */
    public function show(MenuCategory $menuCategory)
    {
        $menuCategory = $this->menuCategoryService->show($menuCategory->id);
        return new MenuCategoryResource($menuCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MenuCategoryFormRequest $request
     * @param  MenuCategory $menuCategory
     * @return MenuCategoryResource
     */
    public function update(MenuCategoryFormRequest $request, MenuCategory $menuCategory)
    {
        $menuCategory = $this->menuCategoryService->update($menuCategory->id, $request->validated());
        return (new MenuCategoryResource($menuCategory))->additional(ResponseType::simpleResponse('MenuCategory has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  MenuCategory $menuCategory
     * @return MenuCategoryResource
     */
    public function destroy(MenuCategory $menuCategory)
    {
        $this->menuCategoryService->delete($menuCategory);
        return new MenuCategoryResource(ResponseType::simpleResponse('MenuCategory has been deleted', true));
    }
}
