<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    //

    public function savecategory(Request $request){
        $category= new Category();
        $category->category_name=$request->input('category_name');
        
       


        $category->save();
        return back()->with('status','categorie crée avec succès');
    }


    //------------------------supprimer une categorie-------------------------

    public function deletecategory($id){
        $category =Category::find($id);
        //$category->delete();

        return view('admin.deletecategory')->with('category',$category);

    }
    public function yesdeletecategory($id){
        $category =Category::find($id);
        $category->delete();

        return redirect('admin/category')->with('status',' categorie supprimée avec succès');

    }


    public function editecategory($id){
        $category= Category::find($id);
        return view('admin.editecategory')->with('category',$category);
    }

    public function updatecategory($id, Request $request){
        $category= Category::find($id);
        $category->category_name=$request->input('category_name');
        $category->update();
        return redirect('admin/category')->with('status','categorie modifiée avec succès');

        

    }
}
