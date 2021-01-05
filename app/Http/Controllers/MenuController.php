<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuFormRequest;
use App\Http\Resources\MenuResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\MenuService;
use Dev\Infrastructure\Models\Menu;

/**
 * Class MenuController
 * @package App\Http\Controllers
 */
class MenuController extends Controller
{
    /**
     * @var MenuService $menuService
     */
    private $menuService;

    /**
     * MenuController constructor.
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $menus = $this->menuService->index();
        return MenuResource::collection($menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MenuFormRequest $request
     * @return MenuResource
     */
    public function store(MenuFormRequest $request)
    {
        $menu = $this->menuService->create($request->validated());
        return (new MenuResource($menu))
            ->additional(ResponseType::simpleResponse('Menu has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  Menu $menu
     * @return MenuResource
     */
    public function show(Menu $menu)
    {
        $menu = $this->menuService->show($menu->id);
        return new MenuResource($menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MenuFormRequest $request
     * @param  Menu $menu
     * @return MenuResource
     */
    public function update(MenuFormRequest $request, Menu $menu)
    {
        $menu = $this->menuService->update($menu->id, $request->validated());
        return (new MenuResource($menu))->additional(ResponseType::simpleResponse('Menu has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Menu $menu
     * @return MenuResource
     */
    public function destroy(Menu $menu)
    {
        $this->menuService->delete($menu);
        return new MenuResource(ResponseType::simpleResponse('Menu has been deleted', true));
    }
}
