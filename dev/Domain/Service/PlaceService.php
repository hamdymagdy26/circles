<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Place;
use Dev\Infrastructure\Repository\PlaceRepository;
use Illuminate\Support\Arr;

/**
 * Class PlaceService
 * @package Dev\Domain\Service
 */
class PlaceService extends AbstractService
{
    /**
     * PlaceService constructor.
     * @param PlaceRepository $repository
     */
    public function __construct(PlaceRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return Place
     */
    public function create($data = [])
    {
        $placeData = Arr::only(
            $data,
            [
                'name',
                'image',
                'longitude',
                'latitude',
                'type_id'
            ]
        );
        return $this->repository->create($placeData);
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
     * @return Place
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Place
     */
    public function update(int $id, $data = [])
    {
        $placeData = Arr::only(
            $data,
            [
                'name',
                'image',
                'longitude',
                'latitude',
                'type_id'
            ]
        );
        $this->repository->where('id', $id)->update($placeData);
        return $this->show($id);
    }

    /**
     * @param Place $place
     * @return integer
     */
    public function delete(Place $place)
    {
        $place->delete();
    }
}
