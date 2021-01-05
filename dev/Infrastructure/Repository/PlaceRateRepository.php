<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\PlaceRate;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class PlaceRateRepository
 * @package Dev\Infrastructure\Repository
 */
class PlaceRateRepository extends AbstractRepository
{
    function __construct(PlaceRate $model)
    {
        parent::__construct($model);
    }
}
