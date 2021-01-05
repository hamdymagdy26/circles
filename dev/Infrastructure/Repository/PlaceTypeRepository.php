<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\PlaceType;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class PlaceTypeRepository
 * @package Dev\Infrastructure\Repository
 */
class PlaceTypeRepository extends AbstractRepository
{
    function __construct(PlaceType $model)
    {
        parent::__construct($model);
    }
}
