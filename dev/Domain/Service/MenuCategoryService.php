<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\MenuCategory;
use Dev\Infrastructure\Repository\MenuCategoryRepository;
use Illuminate\Support\Arr;

/**
 * Class MenuCategoryService
 * @package Dev\Domain\Service
 */
class MenuCategoryService extends AbstractService
{
    /**
     * MenuCategoryService constructor.
     * @param MenuCategoryRepository $repository
     */
    public function __construct(MenuCategoryRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return MenuCategory
     */
    public function create($data = [])
    {
        $menuCategoryData = Arr::only(
            $data,
            [
                'name',
                'menu_id'
            ]
        );

        return $this->repository->create($menuCategoryData);
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
     * @return MenuCategory
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return MenuCategory
     */
    public function update(int $id, $data = [])
    {
        $menuCategoryData = Arr::only(
            $data,
            [
                'name',
                'menu_id'
            ]
        );

        $this->repository->where('id', $id)->update($menuCategoryData);
        return $this->show($id);
    }

    /**
     * @param MenuCategory $menuCategory
     * @return integer
     */
    public function delete(MenuCategory $menuCategory)
    {
        $menuCategory->delete();
        $menuCategory->menuProducts()->delete();
    }
}
