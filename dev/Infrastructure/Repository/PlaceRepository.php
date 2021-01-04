<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\Place;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class PlaceRepository
 * @package Dev\Infrastructure\Repository
 */
class PlaceRepository extends AbstractRepository
{
    function __construct(Place $model)
    {
        parent::__construct($model);
    }
}
