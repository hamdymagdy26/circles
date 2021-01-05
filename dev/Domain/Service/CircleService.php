<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Circle;
use Dev\Infrastructure\Repository\CircleRepository;
use Illuminate\Support\Arr;

/**
 * Class CircleService
 * @package Dev\Domain\Service
 */
class CircleService extends AbstractService
{
    /**
     * CircleService constructor.
     * @param CircleRepository $repository
     */
    public function __construct(CircleRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return Circle
     */
    public function create($data = [])
    {
        $circleData = Arr::only(
            $data,
            [
                'name',
            ]
        );

        $insertCircle = $this->repository->create($circleData);
        if(isset($data['circle_users'])) {
            $insertCircle->users()->attach($data['circle_users']);
        }
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
     * @return Circle
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Circle
     */
    public function update(int $id, $data = [])
    {
        $circleData = Arr::only(
            $data,
            [
                'name',
            ]
        );

        $this->repository->where('id', $id)->update($circleData);
        return $this->show($id);
    }

    /**
     * @param Circle $circle
     * @return integer
     */
    public function delete(Circle $circle)
    {
        $circle->delete();
    }
}
