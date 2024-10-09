<?php

namespace App\Traits;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

trait ManageRolesAndPermissionTrait
{
    public function delete($permission_name)
    {
        $permission_name = trim($permission_name);
        $permission = Permission::findByName($permission_name);

        if($permission->delete()) {
            return true;
        }

        return false;
    }
}
