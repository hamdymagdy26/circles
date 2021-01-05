<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\Favourite;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class FavouriteRepository
 * @package Dev\Infrastructure\Repository
 */
class FavouriteRepository extends AbstractRepository
{
    function __construct(Favourite $model)
    {
        parent::__construct($model);
    }
}
