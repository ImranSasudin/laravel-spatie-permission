<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\Module;
use DB;

class PermissionComponent extends Component
{
    public $role = '';
    public $role_id = '';
    public $role_name;
    public $role_object;

    public function render()
    {

        $permissions = null;
        $roles = null;

        if ($this->role != '') {
            $roles = Role::where('name', 'like', '%' . $this->role . '%')
                ->where('name', '!=', 'super-admin')
                ->paginate(5);
        }
        $modules = Module::all();

        if ($this->role_id != null) {
            $permissions = DB::table('modules')
                ->leftJoin('permissions', 'modules.id', 'permissions.module_id')
                ->leftJoin('role_has_permissions', function ($join) {
                    $join->on('permissions.id', 'role_has_permissions.permission_id')
                        ->where('role_has_permissions.role_id', '=', $this->role_id);
                })
                ->select(
                    'modules.id as module_id',
                    'permissions.name as permission_name',
                    'role_has_permissions.role_id as role_id'
                )
                ->get();
        }

        return view('livewire.permission', [
            'roles' => $roles,
            'permissions' => $permissions,
            'modules' => $modules,
        ]);
    }

    public function role($id, $name)
    {
        $this->role_id = $id;
        $this->role_name = $name;
        $this->role_object = Role::find($id);
    }

    public function permission($id, $name)
    {
        $permission_object = Permission::findByName($name);
        
        $role_object = $this->role_object;
        if($id == 'not-checked'){
            $role_object->givePermissionTo($permission_object);
        } else if ($id == 'checked'){
            $role_object->revokePermissionTo($permission_object);
        }
    }
}
