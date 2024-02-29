<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    //

    public function saveassignment(Request $request){
        $this->validate($request,[
            'role'=>'required',
            'permissions'=>'required|array'
        ]);

        $role=Role::findByName($request->input('role'));

        $permissions=$request->input('permissions',[]);

        $role->syncPermissions($permissions);

        return back()->with('status','role assigner aux permission avec succes');
    }
}
