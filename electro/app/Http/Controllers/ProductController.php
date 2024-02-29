<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function saveproduct(Request $request){
   
    

    $this->validate($request,[
      'product_name'=>'required',
      'product_price'=>'required',
      'product_promo'=>'required',
      'product_reduction'=>'required',
      'product_brand'=>'nullable|string',
      'product_description'=>'required',
      'product_category'=>'required',
      'cover'=>'image|mimes:jpeg,png,gif,jpg|max:2048',
      'images.*' => 'image|mimes:jpeg,png,gif,jpg|max:2048'
      
   

    ]);

    //traiter l'image principale

    if($request->hasFile('cover')){
      $fileCover= $request->file('cover');

      //nom du fichier avec extension
      $coverNameExt=$fileCover->getClientOriginalName();

        //nom du fichier sans  extension

      $coverName=pathinfo($coverNameExt,PATHINFO_FILENAME);

      //extensiopn du fichier
      $coverExt=$fileCover->getClientOriginalExtension();

      //changer et personaliser le nom du fichier
      $coverNameToSave=$coverName.'_'.time().'.'.$coverExt;

      //sauvegarder le fichier dans  le dossier public
      $path=$fileCover->storeAs('public/product_cover',$coverNameToSave);

    }
    $product=new product();
    $product->product_name=$request->input('product_name');
    $product->product_price=$request->input('product_price');
    $product->product_promo=$request->input('product_promo');
    $product->product_reduction=$request->input('product_reduction');
    $product->product_brand=$request->has('product_brand')? 'Nouveau':'';
    $product->product_description=$request->input('product_description');
    $product->product_category=$request->input('product_category');
    $product->cover=$coverNameToSave;


          //retrouver lid de la categorie
    $category=Category::where('category_name',$request->input('product_category'))->first();
    $product->category_id=$category->id;
   $category= $product->save();
 
    


    

    //traitement des images multiple

    if($request->hasFile('images')){
      $files=$request->file('images');

      foreach ($files as $file) {
        $fileNameExt=$file->getClientOriginalName();

        $fileName=pathinfo($fileNameExt,PATHINFO_FILENAME);

        $fileExt=$file->getClientOriginalExtension();

        $fileNameToSave=$fileName.'_'.time().'.'.$fileExt;

        $path=$file->storeAs('public/products_images',$fileNameToSave);

        $productimage=new ProductImage();

        $productimage->images=$fileNameToSave;
        $productimage->product_id=$product->id;

        $productimage->save();


       /* $product->product_images()->create([
          'images'=>$fileNameToSave,
          'prodcut_id'=>$product->id,
        ]);*/
      }
    }
         
       
          
          return back()->with("status","produit enregistré avec succès");
      }



      //--------------modifier le produit--------------

      public function editeproduct($id){

        $products=Product::find($id);
        $categories=Category::get();
        $productimages=$products->product_images;
        return view('admin.editeproduct',compact('products','categories','productimages'));

      }


        //activer les produit
      public function unactivateproduct($id){
        $product=Product::find($id);
        $product->status=0;
        $product->update();
        return back();


      }

      //desactivation des produit


      public function activateproduct($id){
        $product=Product::find($id);
        $product->status=1;
        $product->update();
        return back();


      }

      //---------------------------------supprimer le produit-----------------

      public function deleteproduct($id){
        $product=Product::find($id);

        return view('admin.deleteproduct')->with('product',$product);
      }
      
      public function yesdeleteproduct($id){
        $product=Product::find($id);
        storage::delete("public/product_cover/$product->cover");
        
        if ($product){
          $fileNames=$product->product_images;
          //$fileNames->pluck($fileNames)->toArray();
          foreach ($fileNames as $fileName) {

            storage::delete("public/products_images/$fileName->images");
            
          }
          
        }
        $product->delete();
        
        return redirect('admin/product')->with('status','produit supprimé avec succès');
      }

      /**-------------------supprimer une ou plusieurs images du produit */

      public function deleteproductimage($id){
        $productimage=ProductImage::find($id);
        return view('admin.deleteproductimage')->with('productimage',$productimage);
      }

      public function yesdeleteproductimage($id){
        $productimage=ProductImage::find($id);
      

      
        storage::delete("public/products_images/$productimage->images");
        $productimage->delete();
        return redirect('/admin/editeproduct/'.$productimage->product_id)->with('status','image supprimée avec succès');
      }



      /**----------------modifier les produits----------------------- */

      public function updateproduct($id,Request $request){
        $product=Product::find($id);
        $product->product_name=$request->input('product_name');
        $product->product_price=$request->input('product_price');
        $product->product_promo=$request->input('product_promo');
        $product->product_reduction=$request->input('product_reduction');
        $product->product_brand=$request->input('product_brand');
        $product->product_description=$request->input('product_description');
        $product->product_category=$request->input('product_category');

        //retrouver lid de la categorie

        $category=Category::where('category_name',$request->input('product_category'))->first();

        $product->category_id=$category->id;


        //trater l'image de couverture
        
    if($request->hasFile('cover')){

      $this->validate($request,[
        'cover'=>'image|mimes:jpeg,png,gif,jpg|max:2048',
      ]);

      $fileCover= $request->file('cover');

      //nom du fichier avec extension
      $coverNameExt=$fileCover->getClientOriginalName();

        //nom du fichier sans  extension

      $coverName=pathinfo($coverNameExt,PATHINFO_FILENAME);

      //extensiopn du fichier
      $coverExt=$fileCover->getClientOriginalExtension();

      //changer et personaliser le nom du fichier
      $coverNameToSave=$coverName.'_'.time().'.'.$coverExt;


      //supprimer l'ancienne cover

      storage::delete("public/product_cover/$product->cover");

      //sauvegarder le fichier dans  le dossier public
      $path=$fileCover->storeAs('public/product_cover',$coverNameToSave);

      $product->cover=$coverNameToSave;


    }


        if($request->hasFile('images')){
          $files=$request->file('images');
    
          foreach ($files as $file) {
            $fileNameExt=$file->getClientOriginalName();
    
            $fileName=pathinfo($fileNameExt,PATHINFO_FILENAME);
    
            $fileExt=$file->getClientOriginalExtension();
    
            $fileNameToSave=$fileName.'_'.time().'.'.$fileExt;
    
            $path=$file->storeAs('public/products_images',$fileNameToSave);
    
            $productimage=new ProductImage();
    
            $productimage->images=$fileNameToSave;
            $productimage->product_id=$product->id;
    
            $productimage->save();
    
    
           /* $product->product_images()->create([
              'images'=>$fileNameToSave,
              'prodcut_id'=>$product->id,
            ]);*/
          }
        }

        $product->update();

        return redirect('admin/product')->with('status','produit modifié avec succès');


      }
      
     
     
    
}