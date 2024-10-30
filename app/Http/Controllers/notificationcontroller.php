<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Produit;
use Illuminate\Http\Request;

class notificationcontroller extends Controller
{
    //

    public function liste(){
       // $produits = Auteur::with(['commandenvs', 'Produit'])->where('etat', 'nonlu')->get();
        $produits = Auteur::where('etat', 'nonlu')
        ->with('commandenvs.produit') // Charger les commandes et les produits associés
        ->orderBy('created_at', 'desc')
        ->get();
       // dd($produits);
        return view('Notification.listenotif', compact('produits'));
    }


    public function listecom(){
        // $produits = Auteur::with(['commandenvs', 'Produit'])->where('etat', 'nonlu')->get();
         $produits = Auteur::where('etat', 'lu')
         ->with('commandenvs.produit') // Charger les commandes et les produits associés
         ->get();
        // dd($produits);
         return view('Notification.listenotif', compact('produits'));
     }

    public function lirenotif(Request $request){
        $aut = Auteur::find($request->id);
        if(strcasecmp($aut->etat, "nonlu") === 0 ){ 
        $aut->etat="lu";
        $aut->Update();
        }
        return response()->json([
            'success' => true,
            'message' => 'Element updated successfully!',
            'element' => $aut
        ]);
    }

    public function traiternotif(Request $request){
        $aut = Auteur::find($request->id);
        $aut->etat="traiter";
        $aut->Update();
        return response()->json([
            'success' => true,
            'message' => 'Element updated successfully!',
            'element' => $aut
        ]);
    }
}
