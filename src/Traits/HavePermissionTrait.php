<?php

namespace Sweet1s\VoyagerCoAdmin\Traits;

use Illuminate\Support\Facades\DB;

trait HavePermissionTrait
{
    public function hasPermission($request, $slug)
    {
        $currentPermissions = auth()->user()->role->permissions->pluck('id')->toArray();

        foreach ($request->permissions as $permission) {
            if (!in_array((integer)$permission, $currentPermissions)) {
                return redirect()
                    ->route("voyager.{$slug}.index")
                    ->with([
                        'message' => __('voyager::generic.permission_denied'),
                        'alert-type' => 'error',
                    ]);
            }
        }
    }

    public function hasPermissionRole($request)
    {
        $permissions = auth()->user()->role->permissions->pluck('key')->toArray();
        $roles = array_merge($request->input('user_belongstomany_role_relationship', []), [$request->input('role_id')]);

        foreach (DB::table('roles')->whereIn('id', $roles)->get() as $role) {
            if (!in_array("can_give_{$role->name}", $permissions)) {
                return redirect()
                    ->route("voyager.users.index")
                    ->with([
                        'message' => __('voyager::generic.permission_denied'),
                        'alert-type' => 'error',
                    ]);
            }
        }
    }
}
