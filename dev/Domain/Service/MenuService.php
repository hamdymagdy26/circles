<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Menu;
use Dev\Infrastructure\Repository\MenuRepository;
use Illuminate\Support\Arr;

/**
 * Class MenuService
 * @package Dev\Domain\Service
 */
class MenuService extends AbstractService
{
    /**
     * MenuService constructor.
     * @param MenuRepository $repository
     */
    public function __construct(MenuRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return Menu
     */
    public function create($data = [])
    {
        $menuData = Arr::only(
            $data,
            [
                'name',
                'place_id'
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
     * @return Menu
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Menu
     */
    public function update(int $id, $data = [])
    {
        $menuData = Arr::only(
            $data,
            [
                'name',
                'place_id'
            ]
        );

        $this->repository->where('id', $id)->update($menuData);
        return $this->show($id);
    }

    /**
     * @param Menu $menu
     * @return integer
     */
    public function delete(Menu $menu)
    {
        $menu->delete();
        $menu->categories()->delete();
    }
}
