<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;

class SliderController extends Controller
{
    //

    public function saveslider(Request $request){

        //validateion du formulaire
        $this->validate($request,[
            'description1'=>'required',
            'description2'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);

        /*-----------traiter les images et s'assurer qu'ils n'ont pas les memes nom----------------*/

        //recuperer le  nom de l'image avec son extension
        $fileNameWithExt=$request->file('image')->getClientOriginalName();

        //le nom de l'image sans extension

        $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        

        //recuperer l'extension de l'image

        $fileExt=$request->file('image')->getClientOriginalExtension();

        //creation du nom de l'image a enregistrer

        $fileNameToSave=$fileName.'_'.time().'.'.$fileExt;
        //print($fileNameToSave);

        /*-------------sauvegarder l'image ------------------*/

        $path=$request->file('image')->storeAs("public/slider_images",$fileNameToSave);

        $slider=new Slider();

        $slider->description1=$request->input('description1');
        
        $slider->description2=$request->input('description2');

        $slider->image=$fileNameToSave;
        $slider->save();

        return back()->with("status","slider enregistré avec succès");


    }
    //--------------------------supprimer le slider------------------------------------------

    public function deleteslider($id){
        $slider=Slider::find($id);
       /* storage::delete("public/slider_images/$slider->image");
        $slider->delete();*/
        return view('admin.deleteslider')->with('slider',$slider);
        //return back()->with("status","slider suppeimé avec succès");
    }
    public function yesdeleteslider($id){
        $slider=Slider::find($id);
        storage::delete("public/slider_images/$slider->image");
        $slider->delete();
       
        return redirect('admin/slider')->with('status','slider supprimé avec succès');

    }


        //-------------------------modifier le slider----------------------------------------

    public function editeslider($id){
        $slider=Slider::find($id);
        return view('admin.editeslider')->with('slider',$slider);
    }

    public function updateslider($id ,Request $request){
        $slider=Slider::find($id);
        $slider->description1=$request->input('description1');
        $slider->description2=$request->input('description2');
        if($request->file('image')){
            $this->validate($request,[
                'image'=>'image|nullable|max:1999'
            ]);
            $fileNameWithExt=$request->file('image')->getClientOriginalName();
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $fileExt=$request->file('image')->getClientOriginalExtension();
            $fileNameToSave=$fileName.'_'.time().'.'.$fileExt;
            //supprimer l'ancienne image
            storage::delete("public/slider_images/$slider->image");
            
            $path=$request->file('image')->storeAs("public/slider_images",$fileNameToSave);

            $slider->image=$fileNameToSave;
          
        }
        $slider->update();
        return redirect('admin/slider')->with('status','slider modifié avec succès');
    }

    public function unactivateslider($id){
        $slider=Slider::find($id);
        $slider->status=0;
        $slider->update();
        return back();
    }

    public function activateslider($id){
        $slider=Slider::find($id);
        $slider->status=1;
        $slider->update();
        return back();
    }
}
