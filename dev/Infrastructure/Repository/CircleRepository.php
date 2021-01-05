<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\Circle;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class CircleRepository
 * @package Dev\Infrastructure\Repository
 */
class CircleRepository extends AbstractRepository
{
    function __construct(Circle $model)
    {
        parent::__construct($model);
    }
}
