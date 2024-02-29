<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;

use App\Models\Avi;

class ClientController extends Controller
{
    //
     

    //fonction pour la page d'accueil
    public function home(){
        //sliders
        $sliders= Slider::where('status',1)->get();

        // les produits en fonction des differentes categories
        $categories=Category::with(['products'=>function($requette){
            $requette->where('status',1)->with(['avis'=>function($requette){
                $requette->select('product_id', DB::raw('MAX(rating) as max_rating'))->groupBy('product_id');
            }])->get();
        }])->get();

       // return view('client.home',compact ('sliders','categories'));
        return view('client.home',compact ('sliders','categories'));
    }
    

    /**----------------------------------------------------------------------------------------------- */
    //fonction qui gere la page store
    public function store(){

        //afficher les produit si et seulement si le status est egal a 1
        $produits=Product::get();

       
     
        //afficher les produit dans la page store en ar categories
       $categories=Category::withCount('products')->with(['products'=>function($requette){
            $requette->where('status',1)->with(['avis'=>function($requette){
                $requette->select('product_id', DB::raw('MAX(rating) as max_rating'))->groupBy('product_id');
                  
              
            }])->get();}])->get();

           /* $categories=Category::with(['products'=>function($query){
                $query->where('status',1)->paginate(6);
            }])->get();*/
           
       
     foreach($categories as $categorie){
        $categorie->products=$categorie->products()->paginate(6);
      }
    

  
       

        return view('client.store',compact('categories','produits','categorie'));
    }


    /**---------------------------------------------------------------------- */
    //fonction qui gere la partie où les produits sont presentés en details
    public function productdetail($id){
        //les promotion
        $promotion=Promotion::find($id);
        //les produits
        $product=Product::find($id);
        //afficher la note la plus grande donnée par les clients 
       $higthRating=$product->avis()->max('rating');
        //afficher les avis des clients
       $productAvis1=$product->avis;
        
       //afficher dans la page detail les produit de la meme categorie que le produit en description
        $categorie=Category::where('id',$product->category_id)->with(['products'=>function($requette){
            $requette->where('status',1)->with(['avis'=>function($requette){
                $requette->select( 'product_id',DB::raw('MAX(rating) as max_rating'))->groupBy('product_id');
            }])->get();}])->first();
        $selectCategories= $categorie->products->shuffle()->take(4);


        return view('client.productdetail',compact('product','selectCategories','promotion','higthRating','productAvis1'));
    }


    public function checkout(){
        return view('client.checkout');
    }


    //fonction  pour la recherche 

    public function rechercheclient(Request  $request){
        //
        $recherche=$request->input('mot');
        $resultatProduct=Product::where('product_name','LIKE',"%$recherche%")->orWhere('product_description','LIKE',"%$recherche%")->orWhere('product_category','LIKE',"%$recherche%")->get();
        $recherche=$request->input('mot');
        $resultatPromo=Promotion::where('description1','LIKE',"%$recherche%")->orWhere('description2','LIKE',"%$recherche%")->get();

        return view('client.resultat',compact('resultatPromo','resultatProduct'));

    }
}
