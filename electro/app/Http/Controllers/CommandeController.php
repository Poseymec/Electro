<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CommandeController extends Controller
{
    //

    public function commandeproduit($id){

        //recuperer le produit 

        $produit=Product::find($id);

        //personnaliser le message avec les information sur le produit

        $message="Bonjour, je souhaite commander ce produit: \n".
        "Nom:".$produit->product_name."\n". 
        "Description:".$produit->product_description."\n".
        "Prix:".$produit->product_price."FCFA";
      
        dd($message);
       // rediriger vers whatsapp avec le numero
       
    return redirect()->away("https://api.whatsapp.com/send/?phone={650781558}&text=".urlencode($message)."&app_absent=0");



    }
}
