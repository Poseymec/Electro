<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Pipes\WindowsPipes;

class PromoController extends Controller
{
    //

    public function savepromo(Request $request){

        //validation des donneées

        $this->validate($request,[
            'titre'=>'required',
            'price'=>'required',
            'promo_price'=>'required',
            'description1'=>'required',
            'description2'=>'required',
            'image1'=>'image|nullable|max:1999',
            'image2'=>'image|nullable|max:1999',

        
        ]);
         //traitement de l'image 1
         if($request->hasFile("image1")){
            $image1NameWihtExt=$request->file('image1')->getClientOriginalName();
            $image1Name=pathinfo($image1NameWihtExt,PATHINFO_FILENAME);
            $image1Ext=$request->file('image1')->getClientOriginalExtension();

            //vrai non de l'image 1
            $image1NameToSave='1'.$image1Name.'_'.time().'.'.$image1Ext;
            $path=$request->file('image1')->storeAs("public/promo_image",$image1NameToSave);
         }
             //traitement de l'image 2
         if($request->hasFile("image2")){
            $image2NameWihtExt=$request->file('image2')->getClientOriginalName();
            $image2Name=pathinfo($image2NameWihtExt,PATHINFO_FILENAME);
            $image2Ext=$request->file('image2')->getClientOriginalExtension();

            //vrai non de l'image 2
            $image2NameToSave='2'.$image2Name.'_'.time().'.'.$image2Ext;
            $path=$request->file('image2')->storeAs("public/promo_image",$image2NameToSave);
         }
        
            $promo= new Promotion();

            $promo->titre=$request->input('titre');
            $promo->price=$request->input('price');
            $promo->promo_price=$request->input('promo_price');
            $promo->description1=$request->input('description1');
            $promo->description2=$request->input('description2');
            $promo->image1=$image1NameToSave;
            $promo->image2=$image2NameToSave;
          

            //sauvegarder les information
            
            $promo->save();
            
            return back()->with("status","promotion enregistré avec succès");
    }

    public function editepromo($id){
        $promo= Promotion::find($id);
        return view('admin.editepromo')->with('promo',$promo);
    }

    public function updatepromo($id ,Request $request){

        $promo=Promotion::find($id);

        $promo->titre=$request->input('titre');
        $promo->price=$request->input('price');
        $promo->promo_price=$request->input('promo_price');
        $promo->description1=$request->input('description1');
        $promo->description2=$request->input('description2');

        if($request->file("image1")){
            $this->validate($request,[
                'image1'=>'image|nullable|max:1999'
            ]);
            $image1NameWihtExt=$request->file('image1')->getClientOriginalName();
            $image1Name=pathinfo($image1NameWihtExt,PATHINFO_FILENAME);
            $image1Ext=$request->file('image1')->getClientOriginalExtension();

            //vrai non de l'image 1
            $image1NameToSave='1'.$image1Name.'_'.time().'.'.$image1Ext;
            storage::delete("public/promo_image/$promo->image1");
            $path=$request->file('image1')->storeAs("public/promo_image",$image1NameToSave);
            $promo->image1=$image1NameToSave;
         }
             //traitement de l'image 2
         if($request->file("image2")){
            $this->validate($request,[
                'image2'=>'image|nullable|max:1999'
            ]);
            $image2NameWihtExt=$request->file('image2')->getClientOriginalName();
            $image2Name=pathinfo($image2NameWihtExt,PATHINFO_FILENAME);
            $image2Ext=$request->file('image2')->getClientOriginalExtension();

            //vrai non de l'image 2
            $image2NameToSave='2'.$image2Name.'_'.time().'.'.$image2Ext;
            storage::delete("public/promo_image/$promo->image2");
            $path=$request->file('image2')->storeAs("public/promo_image",$image2NameToSave);
            $promo->image2=$image2NameToSave;
            }

            $promo->update();
            return redirect('admin/promo')->with('status','promo modifiée avec succès');

    }

            //---------------------supprimer la promo-----------------------

            public function deletepromo($id){
                $promo=Promotion::find($id);

                return view('admin.deletepromo')->with('promo',$promo);

            }

            public function yesdeletepromo($id){
                $promo=Promotion::find($id);
                storage::delete("public/promo_image/$promo->image1");
                storage::delete("public/promo_image/$promo->image2");
                $promo->delete();
               
                return redirect('admin/promo')->with('status','promotion supprimée avec succès');

              
            }


            //----------------------------status de la promotion-----------------------

            public function  unactivatepromo($id){
            $promo=Promotion::find($id);
            $promo->status=0;
            $promo->update();

            return back();

            }
            public function  activatepromo($id){
                $promo=Promotion::find($id);
                $promo->status=1;
                $promo->update();

                return back();
            }
   
}

