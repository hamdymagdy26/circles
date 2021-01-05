<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\Tag;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class TagRepository
 * @package Dev\Infrastructure\Repository
 */
class TagRepository extends AbstractRepository
{
    function __construct(Tag $model)
    {
        parent::__construct($model);
    }
}
