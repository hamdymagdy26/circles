<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\UserRate;
use Dev\Infrastructure\Repository\UserRateRepository;
use Illuminate\Support\Arr;

/**
 * Class UserRateService
 * @package Dev\Domain\Service
 */
class UserRateService extends AbstractService
{
    /**
     * UserRateService constructor.
     * @param UserRateRepository $repository
     */
    public function __construct(UserRateRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return UserRate
     */
    public function create($data = [])
    {
        $userRateData = Arr::only(
            $data,
            [
                'stars',
                'place_id',
                'user_id'
            ]
        );

        return $this->repository->create($userRateData);
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
     * @return UserRate
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return UserRate
     */
    public function update(int $id, $data = [])
    {
        $userRateData = Arr::only(
            $data,
            [
                'stars',
                'place_id',
                'user_id'
            ]
        );

        $this->repository->where('id', $id)->update($userRateData);
        return $this->show($id);
    }

    /**
     * @param UserRate $userRate
     * @return integer
     */
    public function delete(UserRate $userRate)
    {
        $userRate->delete();
    }
}
