<?php

namespace App\Http\Controllers;
use App\Models\Avi;
use App\Models\Product;

use Illuminate\Http\Request;

class AvisController extends Controller
{
    //

    public function saveAvis(Request $request){
         // Validation des données du formulaire
        $this->validate($request,[
            'product_id' => 'required|integer',
            'productName' => 'required|string|max:255',
            'nameAvis' => 'required|string|max:255',
            'emailAvis' => 'required|email|max:255',
            'avis' => 'required|string',
            'rating' => 'required|integer|between:1,5',
    ]);


    $avi= new Avi();
    $avi->product_id=$request->input('product_id');
    $avi->productName=$request->input('productName');
    $avi->nameAvis=$request->input('nameAvis');
    $avi->emailAvis=$request->input('emailAvis');
    $avi->avis=$request->input('avis');
    $avi->rating=$request->input('rating');

    $avi->save();
    return back()->with('status','Avis enregistré avec succès');


    }

    public function unactivateAvi($id){
        $avi= Avi::find($id);

        $avi->status=1;
        $avi->update();
        return back();

    }
    public function activateAvi($id){
        $avi= Avi::find($id);

        $avi->status=0;
        $avi->update();
        return back();

    }

    public function deleteAvi($id){
        $avis=Avi::find($id);
        $avis->delete();
        return back()->with('status','avis supprimé avec succès');
    }

}
