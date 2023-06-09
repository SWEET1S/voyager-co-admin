<?php

namespace Sweet1s\VoyagerCoAdmin\Traits;

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
}
