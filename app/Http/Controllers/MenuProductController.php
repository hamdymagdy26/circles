<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuProductFormRequest;
use App\Http\Resources\MenuProductResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\MenuProductService;
use Dev\Infrastructure\Models\MenuProduct;

/**
 * Class MenuProductController
 * @package App\Http\Controllers
 */
class MenuProductController extends Controller
{
    /**
     * @var MenuProductService $menuProductService
     */
    private $menuProductService;

    /**
     * MenuProductController constructor.
     * @param MenuProductService $menuProductService
     */
    public function __construct(MenuProductService $menuProductService)
    {
        $this->menuProductService = $menuProductService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $menuProducts = $this->menuProductService->index();
        return MenuProductResource::collection($menuProducts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MenuProductFormRequest $request
     * @return MenuProductResource
     */
    public function store(MenuProductFormRequest $request)
    {
        $menuProduct = $this->menuProductService->create($request->validated());
        return (new MenuProductResource($menuProduct))
            ->additional(ResponseType::simpleResponse('MenuProduct has been created', true));
    }

    /**
     * Display the specified resource.
     *
     * @param  MenuProduct $menuProduct
     * @return MenuProductResource
     */
    public function show(MenuProduct $menuProduct)
    {
        $menuProduct = $this->menuProductService->show($menuProduct->id);
        return new MenuProductResource($menuProduct);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MenuProductFormRequest $request
     * @param  MenuProduct $menuProduct
     * @return MenuProductResource
     */
    public function update(MenuProductFormRequest $request, MenuProduct $menuProduct)
    {
        $menuProduct = $this->menuProductService->update($menuProduct->id, $request->validated());
        return (new MenuProductResource($menuProduct))->additional(ResponseType::simpleResponse('MenuProduct has been updated', true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  MenuProduct $menuProduct
     * @return MenuProductResource
     */
    public function destroy(MenuProduct $menuProduct)
    {
        $this->menuProductService->delete($menuProduct);
        return new MenuProductResource(ResponseType::simpleResponse('MenuProduct has been deleted', true));
    }
}
