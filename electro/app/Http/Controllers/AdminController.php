<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Slider;
use App\Models\Product;
use App\Models\User;
use App\Models\Avi;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminController extends Controller
{
    //
    /*------------------------------------------------------------------------------------------------------- */
    public function home(){
        $nombreAvi=Avi::count();
        $nombreUser= User::count();
        return view('admin.home',compact('nombreAvi','nombreUser'));
      
    }


    /*------------------------------------------------------------------------------------------------------- */
    public function addcategory(){
        return view('admin.addcategory');
    }
    

    /*------------------------------------------------------------------------------------------------------- */
    public function category(){
        $categories= Category::withCount('products')->get();

      
        return view('admin.category')->with('categories',$categories);
    }
    
    

    /*------------------------------------------------------------------------------------------------------- */
    public function addslider(){
        return view('admin.addslider');
    }
    
    
    

    /*------------------------------------------------------------------------------------------------------- */
    public function slider(){
        $sliders=Slider::get();
        
        return view('admin.slider')->with('sliders',$sliders);
    }

    /**--------------------------------------------------------------------------------------------------- */

    public function choicecategorie(){
        
        $categories=Category::get();
        return view('admin.choicecategorie')->with("categories",$categories);
      
    }
    
    

    /*------------------------------------------------------------------------------------------------------- */
    public function addproduct(){
     $categories=Category::get();
       
        return view('admin.addproduct')->with('categories',$categories);
    }


    /*------------------------------------------------------------------------------------------------------- */
    public function product(){
        $categories= Category::all();
        return view('admin.product')->with('categories',$categories);
    }


    /*------------------------------------------------------------------------------------------------------- */
    public function addpromo(){
        return view('admin.addpromo');
    }
    

    /*------------------------------------------------------------------------------------------------------- */
    public function promo(){
        $promos= Promotion::get();
        return view('admin.promo')->with("promos",$promos);
    }

   /*------------------------------------------------------------------------------------------------------- */

    public function userregister(){

        $users=User::with('roles')->get();

        return view('admin.userregister',compact('users',));

    }
    
    
    public function review(){

        $avis=Avi::get();
        return view('admin.review')->with('avis',$avis);

    }

    /**------------------------------------------------------------------------------------------------------------- */
    public function roles(){

        $roles= Role::get();
        return view('admin.roles')->with('roles',$roles);
    }
    
    /**-------------------------------------------------------------------------------------------------------- */
    public function permissions(){
        $permissions = Permission::get();
        return view('admin.permissions')->with('permissions',$permissions);
    }


    public function assignroletopermission(){
        $permissions=Permission::get();
        $roles=Role::get();

        return view('admin.assignroletopermission',compact('permissions','roles'));
    }
}
