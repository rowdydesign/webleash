<?php

namespace App\Repositories;

/**
 * User Repository
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Repository
 */

use App\User;
use App\Contracts\Repositories\UserRepositoryContract;

use App\Contracts\User\LookupServiceContract as UserLookupServiceContract;

class UserRepository implements UserRepositoryContract
{

    /**
     * Lookup Service
     *
     * @var \App\Contracts\User\LookupServiceContract
     */
    protected $lookupService;

    /**
     * Instantiate user repository
     *
     * @param  \App\Contracts\User\LookupServiceContract  $lookupService
     */
    public function __construct(UserLookupServiceContract $lookupService)
    {
        $this->lookupService = $lookupService;
    }

    /**
     * Get user by
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return \App\User
     */
    public function getUserBy($key, $value)
    {
        return $this->lookupService->getBy($key, $value);
    }

}
