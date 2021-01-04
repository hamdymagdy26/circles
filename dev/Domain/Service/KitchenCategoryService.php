<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\KitchenCategory;
use Dev\Infrastructure\Models\KitchenItem;
use Dev\Infrastructure\Repository\KitchenCategoryRepository;
use Illuminate\Support\Arr;

/**
 * Class KitchenCategoryService
 * @package Dev\Domain\Service
 */
class KitchenCategoryService extends AbstractService
{
    /**
     * KitchenCategoryService constructor.
     * @param KitchenCategoryRepository $repository
     */
    public function __construct(KitchenCategoryRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return KitchenCategory
     */
    public function create($data = [])
    {
        $kitchenCategoryData = Arr::only(
            $data,
            [
                'name_ar',
                'name_en',
            ]);
        return $this->repository->create($kitchenCategoryData);
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
     * @return KitchenCategory
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return KitchenCategory
     */
    public function update(int $id, $data = [])
    {
        $kitchenCategoryData = Arr::only(
            $data,
            [
                'name_ar',
                'name_en',
            ]);
        $this->repository->where('id', $id)->update($kitchenCategoryData);
        return $this->show($id);
    }

    /**
     * @param KitchenCategory $kitchenCategory
     * @return integer
     */
    public function delete(KitchenCategory $kitchenCategory)
    {
        $kitchenCategory->delete();
        $kitchenCategory->kitchenItems()->delete();
    }
    
}