<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\MenuCategory;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class MenuCategoryRepository
 * @package Dev\Infrastructure\Repository
 */
class MenuCategoryRepository extends AbstractRepository
{
    function __construct(MenuCategory $model)
    {
        parent::__construct($model);
    }
}
