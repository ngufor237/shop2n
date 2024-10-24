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
use Barryvdh\DomPDF\Facade\Pdf;


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

    




    










public function modproduit(Request $request){

    $prod = Produit::find($request->id);
    $prod->libelle = $request->libelle;
    $prod->prix=$request->prix;
    $prod->prixbonetat=$request->prixbon;
    $prod->prixetatcorrect=$request->prixcorrect;
        // $prod->souscategorie_id=$request->souscategorie;
        $prod->qttestock=$request->qtte;
        $prod->qttestockbonetat=$request->qttebon;
        $prod->qttestocketatcorrect=$request->qttecorrect;
        $prod->description=$request->description;
        $prod->Update();

        if(is_array($request->image) && count($request->image)>0){
            Image::where('produit_id',$request->id)->delete(); 

            $images=$request->file('image');

$IT=0;
            foreach($images as $ims){
                $IT++;
                $imges=new Image();
            
                $imagenew=time()+$IT;
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




        return redirect()->route('listep2')->with('statue','Produit Modifié avec succès');




}

    public function ListeP(){
        $produits = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])
        ->where('qttestock', '>', 0)
        ->get();
        $souscategories = Categorie::orderBy('created_at', 'desc') 
            ->limit(5)
            ->get();
        $souscategories1 = Categorie::orderBy('created_at', 'desc') 
        ->get();
    $publicites = Publicite::all();
        return view('guestcontain', compact('produits','souscategories','publicites','souscategories1'));
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
 

  $souscategories = SousCategorie::orderBy('created_at', 'desc') 
 ->limit(5)
 ->get(); 
 $souscategories1 = Categorie::orderBy('created_at', 'desc') 
        ->get();


 
 return view('produit.detailproduit', compact('produits','products','souscategories','souscategories1'));
    }
  

    public function produitcate($id)
    {
 $produits = Produit::where('categorie_id', $id)
 ->with('SousCategorie', 'Images')
 ->get();
  $publicites=publicite::all();
  $souscategories = Categorie::orderBy('created_at', 'desc') 
 ->limit(5)
 ->get(); 
 $souscategories1 = Categorie::orderBy('created_at', 'desc') 
        ->get();


 
 return view('guestcontain',compact('produits','souscategories','publicites','souscategories1'));
    }
  




    
    public function addtocard($id){
        $cart = session()->get('cart', []);
        $qtte =  Produit::where('id',$id)->get();
        // $excel = $qtte->qttestock>0;
        // $bon = $qtte->qttestockbonetat>0;
        // $correct =$qtte->qttestocketatcorrect>0;
        // $bonqtte =  Produit::where('qttestockbonetat','>',0)->get();
        // $bonqtte =  Produit::where('qttestockbonetat','>',0)->get();
        foreach($qtte as $qtte){
        // dd($cart);
            try {
                $produit = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->findOrFail($id);
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'Produit non trouvé.');
            }
          // Check if the session has the 'cart' key and if it contains any values
    
            // Retrieve the cart from the session
            $cart = session()->get('cart', []);
            // Check if the product is already in the cart
            if (isset($cart[$id.'__excellentetat'])&&$qtte->qttestock>0) {
                // Increment the quantity
                $cart[$id.'__excellentetat']['qttestock']++;
                $Quantity =$cart[$id.'__excellentetat']['qttestock'];
            } elseif(isset($cart[$id.'__correct']) && $qtte->qttestockbonetat>0){
                $cart[$id.'__correct']['qttestock']++;
                $Quantity =$cart[$id.'__correct']['qttestock'];
            } elseif(isset($cart[$id.'__bon']) && $qtte->qttestocketatcorrect>0){
                $cart[$id.'__correct']['qttestock']++;
                $Quantity =$cart[$id.'__bon']['qttestock'];
            }
            else {
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
                $totalQuantity = count(session()->get('cart', []));
                $totalle=0;
                foreach($cart as $produit){
                $totalle=$totalle + ($produit['qttestock'] * $produit['prix']);
                }
                return response()->json([
                    'total'=>$totalle,
                    'cartQuantity' => $totalQuantity,
                    // 'Quantity'=>$Quantity,
    
                ]);
            // \Log::info('Panier après ajout :', session()->get('cart'));
    
                return redirect()->back()->with('success','Ajout au panier reussi');
                // Redirection avec un message de succès
        }
    }



    public function addtocard1($id){
        $cart = session()->get('cart', []);
        // dd($cart);
            try {
                $produit = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->findOrFail($id);
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'Produit non trouvé.');
            }
          // Check if the session has the 'cart' key and if it contains any values
    if (session()->has('userInfo')|| empty(session()->has('userInfo'))  ) {
            // Retrieve the cart from the session
            $cart = session()->get('cart', []);
            // Check if the product is already in the cart
            if (isset($cart[$id.'__excellentetat'])) {
                // Increment the quantity
                $cart[$id.'__excellentetat']['qttestock']++;
                $Quantity =$cart[$id.'__excellentetat']['qttestock'];
            } elseif(isset($cart[$id.'__correct'])){
                $cart[$id.'__correct']['qttestock']++;
                $Quantity =$cart[$id.'__correct']['qttestock'];
            } elseif(isset($cart[$id.'__bon'])){
                $cart[$id.'__bon']['qttestock']++;
                $Quantity =$cart[$id.'__bon']['qttestock'];
            }
            else {
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
                $totalQuantity = count(session()->get('cart', []));
                $totalle=0;
                foreach($cart as $produit){
                $totalle=$totalle + ($produit['qttestock'] * $produit['prix']);
                }
                return response()->json([
                    'total'=>$totalle,
                    'cartQuantity' => $totalQuantity,
                    'Quantity'=>$Quantity,
    
                ]);
            // \Log::info('Panier après ajout :', session()->get('cart'));
    
                return redirect()->back()->with('success','Ajout au panier reussi');
                // Redirection avec un message de succès
            }
        }



        public function minusfromcard($id) {
            $cart = session()->get('cart', []);
        
            try {
                $produit = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->findOrFail($id);
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return redirect()->back()->with('error', 'Produit non trouvé.');
            }
        
            if (isset($cart[$id.'__excellentetat']) && $cart[$id.'__excellentetat']['qttestock'] > 1) {
                // Decrement quantity
                $cart[$id.'__excellentetat']['qttestock']--;
        
                session()->put('cart', $cart);
                $totalle = 0;
                foreach($cart as $produit) {
                    $totalle += $produit['qttestock'] * $produit['prix'];
                }
                return response()->json([
                    'cartQuantity' => $cart[$id.'__excellentetat']['qttestock'],
                    'total' => $totalle
                ]);
            } elseif (isset($cart[$id.'__correct']) && $cart[$id.'__correct']['qttestock'] != 1) {
                // Decrement quantity
                $cart[$id.'__correct']['qttestock']--;
        
                session()->put('cart', $cart);
                $totalle = 0;
                foreach($cart as $produit) {
                    $totalle += $produit['qttestock'] * $produit['prix'];
                }
                return response()->json([
                    'cartQuantity' => $cart[$id.'__correct']['qttestock'],
                    'total' => $totalle
                ]);
            } elseif (isset($cart[$id.'__bon']) && $cart[$id.'__bon']['qttestock'] != 1) {
                // Decrement quantity
                $cart[$id.'__bon']['qttestock']--;
        
                session()->put('cart', $cart);
                $totalle = 0;
                foreach($cart as $produit) {
                    $totalle += $produit['qttestock'] * $produit['prix'];
                }
                return response()->json([
                    'cartQuantity' => $cart[$id.'__bon']['qttestock'],
                    'total' => $totalle
                ]);
            } else {
                // Handle case where the product is not found in any condition
                $quantity = 1;
                $totalle = 0;
                foreach($cart as $produit) {
                    $totalle += $produit['qttestock'] * $produit['prix'];
                }
                return response()->json([
                    'error' => 'Product not found or invalid operation.',
                    'cartQuantity'=>$quantity,
                    'total' => $totalle
                ]);
            }
        }
        

    public function addtocart2(Request $request){
        $request->validate([
            'id' => 'required',
            'quantite' => 'required',

        ]);
        $id=$request->id;
        $qttep=$request->quantite;
        $qtte =  Produit::where('id',$id)->get();

        
        try {
            $produit = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }
    foreach($qtte as $qtte){
        // Récupération du panier depuis la session
        $cart = session()->get('cart', []);
    
        // Vérification si le produit est déjà dans le panier
        if (isset($cart[$id.'__'.$request->etat])) {
            // Incrémentation de la quantité
            $cart[$id.'__'.$request->etat]['qttestock']=$cart[$id.'__'.$request->etat]['qttestock']+$qttep;
        } else {
            // Ajout du produit au panier avec une quantité initiale de 1
           $prods=$produit->images->first();
        //    dd($qtte->qttestock);
           if($request->etat=="excellentetat"&&$qtte->qttestock>0){
$prixcc=$produit->prix;
           }
           elseif($request->etat=="bonetat"&&$qtte->qttestockbonetat>0){
            $prixcc=$produit->prixbonetat;
                       }
                       elseif($request->etat=="correctetat"&&$qtte->qttestocketatcorrect>0){
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
    }


 return redirect()->back()->with('success','Ajout au panier reussi');
        // Redirection avec un message de succès
    }



public function cartaff(){
    $produits=session()->get('cart', []);
    $myArray = session()->get('userInfo', []);
    if(empty($myArray)){
        $souscategories = Categorie::orderBy('created_at', 'desc')
        ->limit(5)
        ->get(); 
        // dd($auteur);
        $souscategories1 = Categorie::orderBy('created_at', 'desc') 
        ->get();
        $auteur=$myArray;
        return view('cart', compact('produits','souscategories','auteur','souscategories1'));
    }
    else{
    $Array = $myArray->pluck('id')->all();
    $id =  implode(', ', $Array);
    $souscategories = Categorie::orderBy('created_at', 'desc')
    ->limit(5)
    ->get(); 
    // dd($auteur);
    $souscategories1 = Categorie::orderBy('created_at', 'desc') 
    ->get();
    $auteur= Auteur::where('user_id', 'LIKE',''.$id.'')
    ->orderBy('created_at', 'desc')  // Search for the specific name
    ->get();
    // dd($auteur);

    return view('cart', compact('produits','souscategories','auteur','souscategories1'));
    }


}

    public function Listep2(){
        $produits = Produit::with(['Caracteristique', 'Categorie', 'Images'])->get();
        // dd($produits);f
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
        $user = session()->get('userInfo', []);

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
        $qtte =  Produit::where('id',1)->get();
        
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
            $prod = Produit::find($id);
            if ($maxIdff == 'excellentetat') {
                $prod->qttestock -= $order->qtte; // Deduct from excellentetat stock
            } elseif ($maxIdff == 'correctetat') {
                $prod->qttestockcorrectetat -= $order->qtte; // Deduct from correctetat stock
            } elseif ($maxIdff == 'bonetat') {
                $prod->qttestockbonetat -= $order->qtte; // Deduct from bonetat stock
            }
            $prod->save(); // Save the updated stock


         }


         if(is_array($cart) && !empty($cart)){
             // Load a view for the PDF
             
            $cart = session()->get('cart', []);
        
        $pdf = PDF::loadView('recu',compact('cart'));
            // dd($parties[0]);
        $pdf->setPaper('A4', 'landscape');
        // session()->forget('cart');

        // session()->forget('cart');
        return $pdf->download('bilan_facture.pdf');


        // Download the generated PDF
         }

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

    public function cartupdate():JsonResponse
    {
        // Remplace par la logique pour obtenir les données du header
        $quantity = session()->get('cart', []);


        $headerData = [
            'quantity' => $quantity,
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