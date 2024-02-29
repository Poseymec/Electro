<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleController extends Controller
{
    public function createrole(Request $request){
        //creer un role
        $this->validate($request,['name'=>'required|unique:roles,name']);

        $role=new Role();

        $role->name=$request->input('name');

        $role->save();
        return back()->with('status','role crée avec succès');

    }

    
    //modifier un role
    public function editerole($id){
        $role=Role::find($id);
        return view('admin.editerole')->with('role',$role);
    }



    public function updaterole($id ,Request $request){
        $role=Role::find($id);
        $role->name=$request->input('name');
        $role->update();
        return redirect('admin/roles')->with('status','role modifié avec succès');


    }




    public function deleterole($id){
        $role =Role::find($id);
        //$category->delete();

        return view('admin.deleterole')->with('role',$role);

    }
    public function yesdeleterole($id){
        $role =Role::find($id);
        $role->delete();

        return redirect('admin/roles')->with('status',' role supprimé avec succès');

    }
    //verifier si l'utilisateur a le role

    public function checkRole(){
        $user=User::find(1);
        if($user->hasRole('super-admin')){
            return "l'utilisateur est super-admin";

        }else{
            return "l'utilisatuer n'est pas super-admin";
        }
    }


}
