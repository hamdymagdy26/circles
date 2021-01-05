<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\UserRate;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class UserRateRepository
 * @package Dev\Infrastructure\Repository
 */
class UserRateRepository extends AbstractRepository
{
    function __construct(UserRate $model)
    {
        parent::__construct($model);
    }
}
