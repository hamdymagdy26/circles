<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\PlaceInformation;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class PlaceInformationRepository
 * @package Dev\Infrastructure\Repository
 */
class PlaceInformationRepository extends AbstractRepository
{
    function __construct(PlaceInformation $model)
    {
        parent::__construct($model);
    }
}
