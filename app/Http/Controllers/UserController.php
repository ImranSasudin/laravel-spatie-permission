<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class UserController extends Controller
{
    public function dashboard()
    {
        if(Auth::user()->roles()->first()->name == 'super-admin'){
            $modules = DB::table('modules')->get();

            $permissions = DB::table('modules')
                ->select('modules.id as module_id','permissions.name')
                ->join('permissions','permissions.module_id','modules.id')
                ->get();
        } else {
            $modules = DB::table('modules')
            ->select('modules.id', 'modules.name')
            ->join('permissions','modules.id','permissions.module_id')
            ->join('role_has_permissions','role_has_permissions.permission_id','permissions.id')
            ->join('model_has_roles','model_has_roles.role_id','role_has_permissions.role_id')
            ->join('users','users.id','model_has_roles.model_id')
            ->where('users.id', Auth::user()->id)
            ->distinct()
            ->get();

            $permissions = DB::table('modules')
            ->select('modules.id as module_id','permissions.name')
            ->join('permissions','modules.id','permissions.module_id')
            ->join('role_has_permissions','role_has_permissions.permission_id','permissions.id')
            ->join('model_has_roles','model_has_roles.role_id','role_has_permissions.role_id')
            ->join('users','users.id','model_has_roles.model_id')
            ->where('users.id', Auth::user()->id)
            ->get();
        }

        
        
        // dd($permissions);

        return view('dashboard', [
            'permissions' => $permissions,
            'modules' => $modules,
        ]);
    }
}
