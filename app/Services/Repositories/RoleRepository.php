<?php

namespace App\Services\Repositories;

use App\Models\Role;

class RoleRepository extends Repository
{
    /**
     * @return mixed|string
     */
    protected function getClassName()
    {
        return Role::class;
    }

    /**
     * @param int $roleName
     * @param array $permissionsSet
     */
    public function attachUserPermissions(int $roleName, array $permissionsSet)
    {
        $this->className::find($roleName)->permissions()->attach($permissionsSet);
    }
}