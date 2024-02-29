<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class PermissionController extends Controller
{
    //
    //creer une permission

    public function createPermission(Request $request){
        $this->validate($request,['name'=>'required|unique:permissions,name']);

        $permission=new Permission();

        $permission->name=$request->input('name');

        $permission->save();
        return back()->with('status','permission crée avec succès');
    }

    //modifier un permission
    public function editepermission($id){
        $permission=Permission::find($id);
        return view('admin.editepermission')->with('permission',$permission);
    }



    public function updatepermission($id ,Request $request){
        $permission=Permission::find($id);
        $permission->name=$request->input('name');
        $permission->update();
        return redirect('admin/permissions')->with('status','permission modifiée avec succès');
    }



    public function deletepermission($id){
        $permission =Permission::find($id);
        //$category->delete();

        return view('admin.deletepermission')->with('permission',$permission);

    }
    public function yesdeletepermission($id){
        $permission =Permission::find($id);
        $permission->delete();

        return redirect('admin/permissions')->with('status',' categorie supprimée avec succès');

    }

    //verifier si l'itilisateur a une permission
    public function checkPermission(){
        $user=User::find(1);

        if($user->hasPermissionTo('all')){
            return "l'utilisateur a la permission de tout faire";
        }
        else{
            return "l'utilisateur n'a pas de permission";
        }
    }


}
