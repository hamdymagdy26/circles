<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\Menu;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class MenuRepository
 * @package Dev\Infrastructure\Repository
 */
class MenuRepository extends AbstractRepository
{
    function __construct(Menu $model)
    {
        parent::__construct($model);
    }
}
