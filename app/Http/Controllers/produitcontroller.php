<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Produit;
use App\Models\Image;

use App\Models\Categorie;
use App\Models\Produitcara;
use App\Models\Caracteristique;

use Illuminate\Http\Request;

class produitcontroller extends Controller
{
    //

    public function formproduct(){


        // Passer les options à la vue

        $categories = Categorie::all();
        $options = Caracteristique::all();

        return view('produit/formproduit', ['categorie' => $categories,'caracteristique' => $options]);
    }




    public function AddProduit(Request $request){
        $request->validate([
            'libelle' => 'required',
            'prix' => 'required',
            'categorie' => 'required',
            'qtte' => 'required',
            'description' => 'required',
            'image' => 'required',
            'caracteristique' => 'required',

        ]);
       
        $prod=new Produit();
        $prod->libelle=$request->libelle;
        $prod->prix=$request->prix;
        $prod->categorie_id=$request->categorie;
        $prod->qttestock=$request->qtte;
        $prod->description=$request->description;
        $res=$prod->save();

        if($request->hasFile('image')){
$images=$request->file('image');


foreach($images as $ims){
    $imges=new Image();

    $imagenew=time().'_'.$ims->getClientOriginalName();
    $destination=public_path('photos');
    if(!file_exists($destination)){
       $p= mkdir($destination,0775,true);
    }
    $ims->move($destination,$imagenew);
    $imges->nom=$imagenew;
    $maxId = Produit::max('id');
        $imges->produit_id=$maxId;
        $res4=$imges->save();
}
        }
$caracts=$request->caracteristique;
        foreach($caracts as $caract){
            $caracter=new Produitcara();
            $maxIdp = Produit::max('id');
            $maxIdc = Caracteristique::max('id');

                $caracter->produit_id=$maxIdp;
                $caracter->caracteristique_id=$caract;

                $res5=$caracter->save();
        
        
        }

       
       if($res && $res4 && $res5){
        return redirect()->route('formproduct')->with('successaddp', ' product added Successfully');

       }
       else{
        return redirect()->route('formproduct')->with('failaddp', ' product not added Successfully please verify product informations');

       }
    }

public function modproduit(Request $request){

    $prod = Produit::find($request->id);
    $prod->libelle = $request->libelle;
    $prod->prix=$request->prix;
        $prod->categorie_id=$request->categorie;
        $prod->qttestock=$request->qtte;
        $prod->description=$request->description;
        $prod->Update();

        if(is_array($request->image) && count($request->image)>0){
            Image::where('produit_id',$request->id)->delete(); 

            $images=$request->file('image');


            foreach($images as $ims){
                $imges=new Image();
            
                $imagenew=time().'_'.$ims->getClientOriginalName();
                $destination=public_path('photos');
                if(!file_exists($destination)){
                   $p= mkdir($destination,0775,true);
                }
                $ims->move($destination,$imagenew);
                $imges->nom=$imagenew;
                    $imges->produit_id=$request->id;
                    $res4=$imges->save();
            }
        }

        if($request->filled('caracteristique')){
            Produitcara::where('produit_id',$request->id)->delete(); 
            $caracts=$request->caracteristique;

            foreach($caracts as $caract){
                $caracter=new Produitcara();
                $maxIdc = Caracteristique::max('id');
    
                    $caracter->produit_id=$request->id;
                    $caracter->caracteristique_id=$caract;
    
                    $res5=$caracter->save();
            
            
            }



        }





    return redirect('/ListCategorie')->with('statue','Categorie Modifiee avec succes');



}

    public function ListeP(){
        $produits = Produit::with(['Caracteristique', 'Categorie', 'Images'])->get();
        $categories = Categorie::orderBy('created_at', 'desc') 
                               ->limit(10)
                               ->get();

        return view('guestcontain', compact('produits','categories'));
    }

    public function searchprodupd($id){
        $produits = Produit::find($id);
        $categories = Categorie::all();
        $options = Caracteristique::all();
        return view('produit.formprodmod', compact('produits','categories','options'));
    }


    public function suprprodcard($id){
        $produits=session()->get('cart', []);
if (isset($produits[$id])){
    unset($produits[$id]);
    session()->put('cart', $produits);
    return redirect()->back()->with('success','successfully deleted');

}

    
    }








    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $total=0;
        // Met à jour la quantité dans la session
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['qttestock'] = $quantity;
           $total=$quantity*$cart[$productId]['prix'];
        }
        session()->put('cart', $cart);
        
        // Calcule le total
        
        return response()->json(['totalPrice' => $total]);
    }
    public function suprcart(Request $request)
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Successfully deleted');
    }

    public function detailprod($id)
    {
 $produits = Produit::with(['Caracteristique', 'Categorie', 'Images'])->findOrFail($id);
 $products = Produit::where('categorie_id', $produits->categorie->id)
 ->with('Categorie', 'Images')
 ->get();

  $categories23 = Categorie::orderBy('created_at', 'desc') 
 ->limit(10)
 ->get(); 

 
 return view('produit.detailproduit', compact('produits','products','categories23'));
    }
  

    public function produitcate($id)
    {
 $produits = Produit::where('categorie_id', $id)
 ->with('Categorie', 'Images')
 ->get();

  $categories = Categorie::orderBy('created_at', 'desc') 
 ->limit(10)
 ->get(); 

 
 return view('guestcontain',compact('produits','categories'));
    }
  




    public function addtocard($id){
        try {
            $produit = Produit::with(['Caracteristique', 'Categorie', 'Images'])->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }
    
        // Récupération du panier depuis la session
        $cart = session()->get('cart', []);
    
        // Vérification si le produit est déjà dans le panier
        if (isset($cart[$id])) {
            // Incrémentation de la quantité
            $cart[$id]['qttestock']++;
        } else {
            // Ajout du produit au panier avec une quantité initiale de 1
           $prods=$produit->images->first();
            $cart[$id] = [
                "libelle" => $produit->libelle,
                "prix" => $produit->prix,
                "qttestock" => 1,
                "images" => $prods->nom

            ];
        }
    
        // Mise à jour du panier dans la session
        session()->put('cart', $cart);
       // \Log::info('Panier après ajout :', session()->get('cart'));

return redirect()->back()->with('success','ajout au panier reussi');
        // Redirection avec un message de succès
    }



    public function addtocart2(Request $request){
        $request->validate([
            'id' => 'required',
            'quantite' => 'required',

        ]);
        $id=$request->id;
        $qttep=$request->quantite;
        
        try {
            $produit = Produit::with(['Caracteristique', 'Categorie', 'Images'])->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }
    
        // Récupération du panier depuis la session
        $cart = session()->get('cart', []);
    
        // Vérification si le produit est déjà dans le panier
        if (isset($cart[$id])) {
            // Incrémentation de la quantité
            $cart[$id]['qttestock']=$cart[$id]['qttestock']+$qttep;
        } else {
            // Ajout du produit au panier avec une quantité initiale de 1
           $prods=$produit->images->first();
            $cart[$id] = [
                "libelle" => $produit->libelle,
                "prix" => $produit->prix,
                "qttestock" => $qttep,
                "images" => $prods->nom

            ];
        }
    
        // Mise à jour du panier dans la session
        session()->put('cart', $cart);
       // \Log::info('Panier après ajout :', session()->get('cart'));

return redirect()->back()->with('success','ajout au panier reussi');
        // Redirection avec un message de succès
    }



public function cartaff(){
    $produits=session()->get('cart', []);
    $categories23 = Categorie::orderBy('created_at', 'desc') 
 ->limit(10)
 ->get(); 
    return view('cart', compact('produits','categories23'));


}

    public function Listep2(){
        $produits = Produit::with(['Caracteristique', 'Categorie', 'Images'])->get();
        return view('Produit.listeP', compact('produits'));
    }

}
