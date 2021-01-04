<?php

namespace Dev\Infrastructure\Repository;

use App\Models\User;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class UserRepository
 * @package Dev\Infrastructure\Repository
 */
class UserRepository extends AbstractRepository
{
    function __construct(User $model)
    {
        parent::__construct($model);
    }
}
