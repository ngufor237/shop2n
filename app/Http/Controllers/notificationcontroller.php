<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Produit;
use Illuminate\Http\Request;

class notificationcontroller extends Controller
{
    //

    public function liste()
    {
        $produits = Auteur::where('etat', 'nonlu')
            ->with('commandenvs.produit') // Load related commandes and products
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($produit) {
                // Add a flag to indicate if the product is expired (older than 48 hours)
                $produit->isExpired = \Carbon\Carbon::parse($produit->created_at)->addHours(48)->isPast();
                return $produit;


            });
        return view('Notification.listenotif', compact('produits'));
    }

    public function listecom(){
        // $produits = Auteur::with(['commandenvs', 'Produit'])->where('etat', 'nonlu')->get();
         $produits = Auteur::where('etat', 'lu')
         ->with('commandenvs.produit') // Load related commandes and products
         ->orderBy('created_at', 'desc')
         ->get()
         ->map(function ($produit) {
             // Add a flag to indicate if the product is expired (older than 48 hours)
             $produit->isExpired = \Carbon\Carbon::parse($produit->created_at)->addHours(48)->isPast();
             return $produit;


         });
        // dd($produits);
         return view('Notification.listenotif', compact('produits'));
     }
     public function listetraiter(){
        // $produits = Auteur::with(['commandenvs', 'Produit'])->where('etat', 'nonlu')->get();
         $produits = Auteur::where('etat', 'traiter')
         ->with('commandenvs.produit') // Charger les commandes et les produits associés
        ->orderBy('created_at', 'desc')
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
