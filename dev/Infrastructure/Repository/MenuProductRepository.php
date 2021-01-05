<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\MenuProduct;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class MenuProductRepository
 * @package Dev\Infrastructure\Repository
 */
class MenuProductRepository extends AbstractRepository
{
    function __construct(MenuProduct $model)
    {
        parent::__construct($model);
    }
}
