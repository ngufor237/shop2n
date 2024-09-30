<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Produit;
use App\Models\Image;
use App\Models\Categorie;

use App\Models\Produitcara;
use App\Models\Caracteristique;
use App\Models\Commandenv;
use App\Models\Publicite;
use App\Models\SousCategorie;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class produitcontroller extends Controller
{
    //
    

    public function formproduct(){


        // Passer les options à la vue

        $categories = Categorie::all();
        $options = Caracteristique::all();

        return view('produit/formproduit', ['categorie' => $categories,'caracteristique' => $options]);
    }

    public function createinfo(){


        // Passer les options à la vue

        $souscategories = SousCategorie::all();
        $options = Caracteristique::all();

        return view('produit/CreateInfoProduit', ['souscategorie' => $souscategories,'caracteristique' => $options]);
    }




    public function AddProduit(Request $request){
        $request->validate([
            'libelle' => 'required',
            'souscategorie' => 'required',
            'description' => 'required',
            'image' => 'required',
            'caracteristique' => 'required',
            'excellantqtte' => 'required',
            'bonqtte' => 'required',
            'mauvaiseqtte' => 'required',
            'excellantprix' => 'required',
            'bonprix' => 'required',
            'mauvaiseprix' => 'required',
           

        ]);
       
        $prod=new Produit();
        $prod->libelle=$request->libelle;
        $prod->categorie_id=$request->souscategorie;
        $prod->description=$request->description;
        $prod->qttestock=$request->excellantqtte;
        $prod->qttestockbonetat=$request->bonqtte;
        $prod->qttestocketatcorrEct=$request->mauvaiseqtte;
        $prod->prix=$request->excellantprix;
        $prod->prixbonetat=$request->bonprix;
        $prod->prixetatcorrect=$request->mauvaiseprix;

        $res=$prod->save();


        
        
        if($request->hasFile('image'))
        {
            $images=$request->file('image');

            $IT=0;
            foreach($images as $ims){

                $imges=new Image();
            $IT++;
                $imagenew=time()+$IT;
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


        
    

       
    //    if($res && $res4 && $res5){
    //     return redirect()->route('formproduct')->with('successaddp', ' Produit Ajoutée avec Succès');

    //    }
    //    else{
    //     return redirect()->route('formproduct')->with('failaddp', ' Produit n a pas été Ajoutée verifiez les informations');

    //    }
    }

    




    










// public function modproduit(Request $request){

//     $prod = Produit::find($request->id);
//     $prod->libelle = $request->libelle;
//     $prod->prix=$request->prix;
//         $prod->souscategorie_id=$request->souscategorie;
//         $prod->qttestock=$request->qtte;
//         $prod->description=$request->description;
//         $prod->Update();

//         if(is_array($request->image) && count($request->image)>0){
//             Image::where('produit_id',$request->id)->delete(); 

//             $images=$request->file('image');

// $IT=0;
//             foreach($images as $ims){
//                 $IT++;
//                 $imges=new Image();
            
//                 $imagenew=time()+$IT;
//                 $destination=public_path('photos');
//                 if(!file_exists($destination)){
//                    $p= mkdir($destination,0775,true);
//                 }
//                 $ims->move($destination,$imagenew);
//                 $imges->nom=$imagenew;
//                     $imges->produit_id=$request->id;
//                     $res4=$imges->save();
//             }
//         }

//         if($request->filled('caracteristique')){
//             Produitcara::where('produit_id',$request->id)->delete(); 
//             $caracts=$request->caracteristique;

//             foreach($caracts as $caract){
//                 $caracter=new Produitcara();
//                 $maxIdc = Caracteristique::max('id');
    
//                     $caracter->produit_id=$request->id;
//                     $caracter->caracteristique_id=$caract;
    
//                     $res5=$caracter->save();
            
            
//             }



//         }




//         return redirect()->route('listep2')->with('statue','Produit Modifié avec succès');




// }

    public function ListeP(){
        $produits = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->get();
        $souscategories = SousCategorie::orderBy('created_at', 'desc') 
                               ->limit(5)
                               ->get();
    $publicites = Publicite::all();
        return view('guestcontain', compact('produits','souscategories','publicites'));
    }

    public function searchprodupd($id){
        $produits = Produit::find($id);
        $souscategories = SousCategorie::all();
        $options = Caracteristique::all();
        return view('produit.formprodmod', compact('produits','souscategories','options'));
    }


    public function suprprodcard($id){
        $produits=session()->get('cart', []);
if (isset($produits[$id])){
    unset($produits[$id]);
    session()->put('cart', $produits);
    return redirect()->back()->with('success','Produit Supprimé du panier avec succès');

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
 $produits = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->findOrFail($id);
 $products = Produit::where('categorie_id', $produits->categorie->id)
 ->with('SousCategorie', 'Images')
 ->get();

  $souscategories23 = SousCategorie::orderBy('created_at', 'desc') 
 ->limit(10)
 ->get(); 

 
 return view('produit.detailproduit', compact('produits','products','souscategories23'));
    }
  

    public function produitcate($id)
    {
 $produits = Produit::where('souscategorie_id', $id)
 ->with('SousCategorie', 'Images')
 ->get();
  $publicites=publicite::all();
  $souscategories = SousCategorie::orderBy('created_at', 'desc') 
 ->limit(5)
 ->get(); 

 
 return view('guestcontain',compact('produits','souscategories','publicites'));
    }
  




    public function addtocard($id){
        try {
            $produit = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }
    
      // Check if the session has the 'cart' key and if it contains any values
if (session()->has('userInfo') && !empty(session()->get('userInfo'))) {
    // Retrieve the cart from the session
    $cart = session()->get('cart', []);

    // Check if the product is already in the cart
    if (isset($cart[$id.'__excellentetat'])) {
        // Increment the quantity
        $cart[$id.'__excellentetat']['qttestock']++;
    } else {
        // Add the product to the cart with an initial quantity of 1
        $prods = $produit->images->first();
        $cart[$id.'__excellentetat'] = [
            "libelle" => $produit->libelle,
            "prix" => $produit->prix,
            "qttestock" => 1,
            "etat" => "Excellent",
            "images" => $prods->nom
        ];
    }

    // Update the session with the new cart
    session()->put('cart', $cart);
} else {
    // If the session 'cart' key does not exist or is empty, initialize the cart array
    $cart = [];
    // Add the product to the cart with an initial quantity of 1
    $prods = $produit->images->first();
    $cart[$id.'__excellentetat'] = [
        "libelle" => $produit->libelle,
        "prix" => $produit->prix,
        "qttestock" => 1,
        "etat" => "Excellent",
        "images" => $prods->nom
    ];

}

    
        // Mise à jour du panier dans la session
        session()->put('cart', $cart);
       // \Log::info('Panier après ajout :', session()->get('cart'));

return redirect()->back()->with('success','Ajout au panier reussi');
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
            $produit = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }
    
        // Récupération du panier depuis la session
        $cart = session()->get('cart', []);
    
        // Vérification si le produit est déjà dans le panier
        if (isset($cart[$id.'__'.$request->etat])) {
            // Incrémentation de la quantité
            $cart[$id.'__'.$request->etat]['qttestock']=$cart[$id.'__'.$request->etat]['qttestock']+$qttep;
        } else {
            // Ajout du produit au panier avec une quantité initiale de 1
           $prods=$produit->images->first();
           if($request->etat=="excellent"){
$prixcc=$produit->prix;
           }
           elseif($request->etat=="bon"){
            $prixcc=$produit->prixbonetat;
                       }
                       elseif($request->etat=="correct"){
                        $prixcc=$produit->prixetatcorrect;
                                   }
            $cart[$id.'__'.$request->etat] = [
                "libelle" => $produit->libelle,
                "prix" => $prixcc,
                "qttestock" => $qttep,
                "images" => $prods->nom,
                "etat" => $request->etat
            ];
        }
    
        // Mise à jour du panier dans la session
        session()->put('cart', $cart);
       // \Log::info('Panier après ajout :', session()->get('cart'));



 return redirect()->back()->with('success','Ajout au panier reussi');
        // Redirection avec un message de succès
    }



public function cartaff(){
    $produits=session()->get('cart', []);
    $myArray = session()->get('userInfo', []);
    if(empty($myArray)){
        $souscategories23 = SousCategorie::orderBy('created_at', 'desc')
        ->limit(10)
        ->get(); 
        // dd($auteur);
        $auteur=$myArray;
        return view('cart', compact('produits','souscategories23','auteur'));
    }
    else{
    $Array = $myArray->pluck('id')->all();
    $id =  implode(', ', $Array);
    $souscategories23 = SousCategorie::orderBy('created_at', 'desc')
    ->limit(10)
    ->get(); 
    $auteur= Auteur::where('user_id', 'LIKE',''.$id.'') // Search for the specific name
    ->get();
    // dd($auteur);

    return view('cart', compact('produits','souscategories23','auteur'));
    }


}

    public function Listep2(){
        $produits = Produit::with(['Caracteristique', 'Categorie', 'Images'])->get();
        // dd($produits);
        $categories = Categorie::all();
        // dd($categories);
        return view('Produit.listeP', compact('produits','categories'));
    }
    public function tableinfo(){
        $produits = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->get();
        $souscategories = SousCategorie::all();
        return view('Produit.tableInfoProduit', compact('produits','souscategories'));
    }














    public function ajoutcommandenv(Request $request){

        $cart = session()->get('cart', []);
        $auteur=new Auteur();
        if (is_array($cart) && empty($cart)) {
            return redirect()->back()->with('fail','veuillez choisir vos produits');

        }
        else{ 

        $auteur->nom = $request->nom;
        $auteur->prenom = $request->prenom;
        $auteur->numero = $request->phone;
        $auteur->user_id = $request->userid;
        $auteur->email = $request->email;
        $auteur->contact_what = $request->contact;
        $auteur->etat = "nonlu";

        $auteur->save();
        $maxId = Auteur::max('id');
        foreach ($cart as $id => $productData) {
            // Exemple d'ajout dans une table `orders` pour chaque produit
            // Vous pouvez également avoir une autre logique en fonction de votre structure de base de données
            $order = new Commandenv();
            if (strpos($id, "__") !== false) {
                $parties = explode("__", $id);
                // Assurez-vous d'avoir exactement trois parties
                if (count($parties) === 2) {
                    list($part, $maxIdff) = $parties;  
                 } }
            $order->produit_id = $part;
            $order->auteur_id = $maxId;
            $order->etat = $productData['etat'];
            $order->prix = $productData['prix'];
            $order->qtte = $productData['qttestock'];

            $order->save();
         }
        session()->forget('cart');
        return redirect()->back()->with('success','commande passe avec succes');
        }

        //     $prod = Produit::find($productData['libelle']);
        // if($productData['etat']=="Excellent"){ 
        //         $prod->qttestock=$prod->qttestock+$productData['qtte'];
        //         if(isset($productData['prixv'])){
        //         $prod->prix=$productData['prixv'];
        //         }
        // } 
        // elseif($productData['etat']=="Bon"){ 
        //     $prod->qttestockbonetat=$prod->qttestockbonetat+$productData['qtte'];
        //     if(isset($productData['prixv'])){
        //     $prod->prixbonetat=$productData['prixv'];
        //     }

        // } 
        // elseif($productData['etat']=="Correct"){ 

        //     $prod->qttestocketatcorrect=$prod->qttestocketatcorrect+$productData['qtte'];
        //     if(isset($productData['prixv'])){
        //     $prod->prixetatcorrect=$productData['prixv'];
        //     }

        // }
        //         $prod->Update();
       

    }

    public function index():JsonResponse
    {
        // Remplace par la logique pour obtenir les données du header
        $notificationCount = Auteur::where('etat', 'nonlu')->count();

        $headerData = [
            'title' => $notificationCount,
            // Ajoute d'autres données si nécessaire
        ];
        return response()->json($headerData);
    }


    public function ListePublicite(){

        $publicites = Publicite::with(['Produit'])->get();
        
        return view('Publicite.listePublicite', compact('publicites'));

    }

    public function formpublicite(){
        $produits=Produit::all();
        return view('Publicite.addpublicite',compact('produits'));
    }


public function addpub(Request $request){

    if($request->hasFile('image')){
        $images=$request->file('image');
        
        $IT=0;
        
        foreach($images as $ims){
            $imges=new Publicite();
        $IT++;
            $imagenew=time()+$IT;
            $destination=public_path('photos');
            if(!file_exists($destination)){
               $p= mkdir($destination,0775,true);
            }
            $ims->move($destination,$imagenew);
            $imges->nom=$imagenew;
            $maxId = $request->libelle;
                $imges->produit_id=$maxId;
                $res4=$imges->save();
        }
        return redirect()->back()->with('success','ajout au panier reussi');
}

return redirect()->back()->with('fail','Echec d ajout au panier');

}

public function Supprimerpub($id){
    // $request->validate([
    //     'categorie' => 'required',
    // ]);
    $categories = Publicite::find($id);
    $categories->delete();
    return redirect('/listepublicite')->with('status','publicite Supprimée avec succès');
    
}
}
