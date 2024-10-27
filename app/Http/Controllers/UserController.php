<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles.permissions')->get();

        if ($users->isNotEmpty()) {
            foreach ($users as $user) {
                $roleName = $user->getRoleNames()->first();

                $user->permission_summary = count($this->getPermissionsByRoleName($roleName));
            }
        }

        return view('after-login.pengguna.index', compact('users'));
    }

    public function getPermissionsByRoleName($roleName)
    {
        $role = Role::where('name', $roleName)->with('permissions')->first();

        return $role ? $role->permissions : collect();
    }
}
