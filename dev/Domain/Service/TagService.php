<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Tag;
use Dev\Infrastructure\Repository\TagRepository;
use Illuminate\Support\Arr;

/**
 * Class TagService
 * @package Dev\Domain\Service
 */
class TagService extends AbstractService
{
    /**
     * TagService constructor.
     * @param TagRepository $repository
     */
    public function __construct(TagRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $data
     * @return Tag
     */
    public function create($data = [])
    {
        $tagData = Arr::only(
            $data,
            [
                'name',
            ]
        );
        return $this->repository->create($tagData);
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
     * @return Tag
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Tag
     */
    public function update(int $id, $data = [])
    {
        $tagData = Arr::only(
            $data,
            [
                'name',
            ]
        );
        $this->repository->where('id', $id)->update($tagData);
        return $this->show($id);
    }

    /**
     * @param Tag $tag
     * @return integer
     */
    public function delete(Tag $tag)
    {
        $tag->delete();
    }
}
