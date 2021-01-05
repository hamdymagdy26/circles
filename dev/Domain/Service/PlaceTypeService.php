<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\PlaceType;
use Dev\Infrastructure\Repository\PlaceTypeRepository;
use Illuminate\Support\Arr;

/**
 * Class PlaceTypeService
 * @package Dev\Domain\Service
 */
class PlaceTypeService extends AbstractService
{
    /**
     * PlaceTypeService constructor.
     * @param PlaceTypeRepository $repository
     */
    public function __construct(PlaceTypeRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return PlaceType
     */
    public function create($data = [])
    {
        $placeTypeData = Arr::only(
            $data,
            [
                'name',
            ]
        );
        return $this->repository->create($placeTypeData);
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
     * @return PlaceType
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return PlaceType
     */
    public function update(int $id, $data = [])
    {
        $placeTypeData = Arr::only(
            $data,
            [
                'name',
            ]
        );
        $this->repository->where('id', $id)->update($placeTypeData);
        return $this->show($id);
    }

    /**
     * @param PlaceType $placeType
     * @return integer
     */
    public function delete(PlaceType $placeType)
    {
        $placeType->delete();
        $placeType->places()->delete();
    }
}
