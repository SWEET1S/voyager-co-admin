<?php

namespace Sweet1s\VoyagerCoAdmin\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Sweet1s\VoyagerCoAdmin\Traits\HavePermissionTrait;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class VoyagerCoAdminUserController extends VoyagerBaseController
{

    use HavePermissionTrait;

    public function update(Request $request, $id)
    {
        $this->hasPermissionRole($request);

        if (Auth::user()->getKey() == $id) {
            $request->merge([
                'role_id'                              => Auth::user()->role_id,
                'user_belongstomany_role_relationship' => Auth::user()->roles->pluck('id')->toArray(),
            ]);
        }

        return parent::update($request, $id);
    }
}

