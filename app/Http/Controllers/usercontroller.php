<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Auteur;
use App\Models\Produit;
use App\Models\Image;
use App\Models\Categorie;

use App\Models\Produitcara;
use App\Models\Caracteristique;
use App\Models\Commandenv;
use App\Models\Publicite;
use App\Models\SousCategorie;
use Illuminate\Http\JsonResponse;
use Barryvdh\DomPDF\Facade\Pdf;

class usercontroller extends Controller
{
    //

    public function signin(){
        return view('forminscription');
    }

    public function FormUser(){
        return view('Utilisateurs.utilisateur');
    }


    public function logout(){
        Auth::logout();
        session()->forget('userInfo');
        session()->forget('cart');
        return redirect()->route('login');
    }

    public function login(){
        $produits = Produit::with(['Caracteristique', 'SousCategorie', 'Images'])->get();
        $souscategories = Categorie::orderBy('created_at', 'desc') 
                               ->limit(5)
                               ->get();
    $publicites = Publicite::all();
    return view('formconnexion',compact('produits','souscategories','publicites'));
        
    }

    public function createuser(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',

        ]);
        $perso=new user();
        $perso->name=$request->name;
        $perso->email=$request->email;
        $perso->password=$request->password;
        $perso->statut="user";


        $perso->save();

        // $this->validator($request->all())->validate();

        // $user = $this->create($request->all());

        // // Connecter l'utilisateur ou rediriger
        // auth()->login($user);

        return redirect()->route('signin')->with('success', ' Successfully Sign in ');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'statut' => "user",

        ]);
    }

public function loginuser(Request $request){

$usera=$request->validate([
 "email"=>["required"],
 "password"=>["required"]

]);

if(Auth::attempt($usera)){

$request->session()->regenerate();
$user = Auth::user(); // Récupérer l'utilisateur authentifié
$credentials = User::where('email','' .$request->email.'')->get();

$request->session()->put('userInfo', $credentials);

// $myArray = $request->session()->get('userInfo', []);
// dd($credentials);
$userstat = $user->statut;
if($userstat=="user"){ 
return redirect()->route('ListeP');
}
elseif($userstat=="secretaire"){ 
    return redirect()->route('secretaire');
    }
    elseif($userstat=="admin"){ 
        return redirect()->route('admin');
        }
}
else{ 

    return redirect()->route('login')->with('fail', ' Identifiants incorrects, veuillez réessayer ');

}

// $utitilisateur=User::where("email",$usera["email"])->first();
// if(!$utitilisateur) return view('welcome');
// if(!Hash::check($usera["password"],$utitilisateur->password)){

//     return view('welcome');
// }
// else {
//     return redirect()->route('acceuill');

// }
    }


    public function getOptions()
{
    $options = User::all(['id', 'name']); // ou toute autre colonne nécessaire
    return response()->json($options);
}

public function createutilisateur(Request $request){

    $request->validate([
        'email' => 'required',
        'password' => 'required',
        'name' => 'required',
        'droit' =>'required',

    ]);
    $perso=new user();
    $perso->name=$request->name;
    $perso->email=$request->email;
    $perso->password=$request->password;
    $perso->statut=$request->droit;


    $perso->save();

    // $this->validator($request->all())->validate();

    // $user = $this->create($request->all());

    // // Connecter l'utilisateur ou rediriger
    // auth()->login($user);

    return redirect()->route('Utilisateur')->with('success', ' Successfully Sign in');
}

public function Liste(){
    $users = User::all();
    return view('Utilisateurs.ListeUtilisateur', compact('users'));
}

public function Supprimeruser($id){
    // $request->validate([
    //     'categorie' => 'required',
    // ]);
    $userid = User::find($id);
    $userid->delete();
    return redirect('ListUtilisateur')->with('status','Uttilisateur Supprimée avec succès');
    
}
}


