<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\PlaceRate;
use Dev\Infrastructure\Repository\PlaceRateRepository;
use Illuminate\Support\Arr;

/**
 * Class PlaceRateService
 * @package Dev\Domain\Service
 */
class PlaceRateService extends AbstractService
{
    /**
     * PlaceRateService constructor.
     * @param PlaceRateRepository $repository
     */
    public function __construct(PlaceRateRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return PlaceRate
     */
    public function create($data = [])
    {
        $placeRateData = Arr::only(
            $data,
            [
                'stars',
                'place_id',
                'user_id'
            ]
        );

        return $this->repository->create($placeRateData);
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
     * @return PlaceRate
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return PlaceRate
     */
    public function update(int $id, $data = [])
    {
        $placeRateData = Arr::only(
            $data,
            [
                'stars',
                'place_id',
                'user_id'
            ]
        );

        $this->repository->where('id', $id)->update($placeRateData);
        return $this->show($id);
    }

    /**
     * @param PlaceRate $placeRate
     * @return integer
     */
    public function delete(PlaceRate $placeRate)
    {
        $placeRate->delete();
    }
}
