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
                'place_type_id'
            ]
        );
        $insertPlace = $this->repository->create($placeData);

        if (isset($data['tags'])) {
            $insertPlace->tags()->attach($data['tags']);
        }
        
        return $insertPlace;
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
                'place_type_id'
            ]
        );

        $place = $this->repository->find($id);

        $this->repository->where('id', $id)->update($placeData);

        if (isset($data['tags'])) {
            $place->tags()->sync($data['tags']);
        }
        return $this->show($id);
    }

    /**
     * @param Place $place
     * @return integer
     */
    public function delete(Place $place)
    {
        $place->delete();
        $place->menus()->delete();
        $place->rates()->delete();
    }
}
