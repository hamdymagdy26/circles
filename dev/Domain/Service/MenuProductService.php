<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\MenuProduct;
use Dev\Infrastructure\Repository\MenuProductRepository;
use Illuminate\Support\Arr;

/**
 * Class MenuProductService
 * @package Dev\Domain\Service
 */
class MenuProductService extends AbstractService
{
    /**
     * MenuProductService constructor.
     * @param MenuProductRepository $repository
     */
    public function __construct(MenuProductRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return MenuProduct
     */
    public function create($data = [])
    {
        $menuData = Arr::only(
            $data,
            [
                'name',
                'menu_category_id',
                'image',
                'price'
            ]
        );

        return $this->repository->create($menuData);
    }

    /**
     * @param array $filter
     * @param int $limit
     * @return mixed
     */
    public function index(array $filter = [], int $limit = 15)
    {
        $repository = $this->repository;
        return $repository->paginate($limit);
    }

    /**
     * @param int $id
     * @return MenuProduct
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return MenuProduct
     */
    public function update(int $id, $data = [])
    {
        $menuData = Arr::only(
            $data,
            [
                'name',
                'menu_category_id',
                'image',
                'price'
            ]
        );

        $this->repository->where('id', $id)->update($menuData);
        return $this->show($id);
    }

    /**
     * @param MenuProduct $menu
     * @return integer
     */
    public function delete(MenuProduct $menu)
    {
        $menu->delete();
        $menu->categories()->delete();
    }
}
