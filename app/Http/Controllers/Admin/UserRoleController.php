<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function addRoleToUser(User $user, Role $role)
    {

    }

    public function removeRoleFromUser(User $user, Role $role)
    {

    }
}
