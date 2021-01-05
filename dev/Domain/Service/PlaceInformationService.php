<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\PlaceInformation;
use Dev\Infrastructure\Repository\PlaceInformationRepository;
use Illuminate\Support\Arr;

/**
 * Class PlaceInformationService
 * @package Dev\Domain\Service
 */
class PlaceInformationService extends AbstractService
{
    /**
     * PlaceInformationService constructor.
     * @param PlaceInformationRepository $repository
     */
    public function __construct(PlaceInformationRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return PlaceInformation
     */
    public function create($data = [])
    {
        $placeInformationData = Arr::only(
            $data,
            [
                'place_id',
                'seat_type',
                'seatNumber',
                'pricePerSeat',
                'seatLevel'
            ]
        );

        return $this->repository->create($placeInformationData);
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
     * @return PlaceInformation
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return PlaceInformation
     */
    public function update(int $id, $data = [])
    {
        $placeInformationData = Arr::only(
            $data,
            [
                'seat_type',
                'seatNumber',
                'pricePerSeat',
                'seatLevel'
            ]
        );

        $this->repository->where('id', $id)->update($placeInformationData);
        return $this->show($id);
    }

    /**
     * @param PlaceInformation $placeInformation
     * @return integer
     */
    public function delete(PlaceInformation $placeInformation)
    {
        $placeInformation->delete();
    }
}
