<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Favourite;
use Dev\Infrastructure\Repository\FavouriteRepository;
use Illuminate\Support\Arr;

/**
 * Class FavouriteService
 * @package Dev\Domain\Service
 */
class FavouriteService extends AbstractService
{
    /**
     * FavouriteService constructor.
     * @param FavouriteRepository $repository
     */
    public function __construct(FavouriteRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return Favourite
     */
    public function create($data = [])
    {
        $favouriteData = Arr::only(
            $data,
            [
                'user_id',
                'place_id'
            ]
        );

        return $this->repository->create($favouriteData);
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
     * @return Favourite
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Favourite
     */
    public function update(int $id, $data = [])
    {
        $favouriteData = Arr::only(
            $data,
            [
                'user_id',
                'place_id'
            ]
        );

        $this->repository->where('id', $id)->update($favouriteData);
        return $this->show($id);
    }

    /**
     * @param Favourite $favourite
     * @return integer
     */
    public function delete(Favourite $favourite)
    {
        $favourite->delete();
    }
}
