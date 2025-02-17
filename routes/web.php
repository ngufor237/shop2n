<?php

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Localisation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\achatcontroller;

use App\Http\Controllers\produitcontroller;


use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LocalisationController;
use App\Http\Controllers\notificationcontroller;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\CaracteristiqueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/Utilisateur',[usercontroller::class, 'FormUser'])->name('Utilisateur');
Route::post('/AddUtilisateur',[usercontroller::class, 'createutilisateur'])->name('AddUtilisateur');
Route::get('/ListUtilisateur',[usercontroller::class, 'Liste'])->name('ListUtilisateur');
Route::get('/supprimeruser/{id}',[usercontroller::class, 'supprimeruser'])->name('supprimeruser');
Route::get('/admin', function () {
    return view('admin');
})->name('admin');    // Autres routes admin
Route::get('/search-products', [produitcontroller::class, 'search']);

Route::group(['middleware' => 'admin'], function() {
//routes pour la categorie   
Route::get('/Categorie',[CategorieController::class, 'FormCategorie'])->name('Categorie');
Route::post('/AddCategorie',[CategorieController::class, 'AddCategorie'])->name('AddCategorie');
Route::get('/ListeCategorie',[CategorieController::class, 'Liste'])->name('ListeCategorie');
Route::get('/SupprimerCategorie/{id}',[CategorieController::class, 'Supprimer'])->name('SupprimerCategorie');
Route::get('/ModifierCategorie/{id}',[CategorieController::class, 'Modifier'])->name('ModifierCategorie');
Route::post('/UpdateCategorie',[CategorieController::class, 'Update'])->name('UpdateCategorie');


//routes pour la sous categorie
Route::get('/SousCategorie',[SousCategorieController::class, 'FormSousCategorie'])->name('SousCategorie');
Route::post('/AddSousCategorie',[SousCategorieController::class, 'AddSousCategorie'])->name('AddSousCategorie');
Route::get('/ListeSousCategorie',[SousCategorieController::class, 'Liste'])->name('ListeSousCategorie');
Route::get('/SupprimerSousCategorie/{id}',[SousCategorieController::class, 'Supprimer'])->name('SupprimerSousCategorie');
Route::get('/ModifierSousCategorie/{id}',[SousCategorieController::class, 'Modifier'])->name('ModifierSousCategorie');
Route::post('/UpdateSousCategorie',[SousCategorieController::class, 'Update'])->name('UpdateSousCategorie');
Route::get('/selectcategorie', [SousCategorieController::class, 'selectcategorie'])->name('selectcategorie');



// Appel des routes pour la caracteristique
Route::get('/Caracteristique',[CaracteristiqueController::class, 'FormCaracteristique'])->name('Caracteristique');
Route::post('/AddCaracteristique',[CaracteristiqueController::class, 'AddCaracteristique'])->name('AddCaracteristique');
Route::get('/ListCaracteristique',[CaracteristiqueController::class, 'Liste'])->name('ListCaracteristique');
Route::get('/SupprimerCaracteristique/{id}',[CaracteristiqueController::class, 'Supprimer'])->name('SupprimerCaracteristique');
Route::get('/ModifierCaracteristique/{id}',[CaracteristiqueController::class, 'Modifier'])->name('ModifierCaracteristique');
Route::post('/UpdateCaracteristique',[CaracteristiqueController::class, 'Update'])->name('UpdateCaracteristique');

// Appel des routes pour la Localisation
Route::get('/Localisation',[LocalisationController::class, 'FormLocalisation'])->name('Localisation');
Route::post('/AddLocalisation',[LocalisationController::class, 'AddLocalisation'])->name('AddLocalisation');
Route::get('/ListLocalisation',[LocalisationController::class, 'Liste'])->name('ListLocalisation');
Route::get('/SupprimerLocalisation/{id}',[LocalisationController::class, 'Supprimer'])->name('SupprimerLocalisation');
Route::get('/ModifierLocalisation/{id}',[LocalisationController::class, 'Modifier'])->name('ModifierLocalisation');
Route::post('/UpdateLocalisation',[LocalisationController::class, 'Update'])->name('UpdateLocalisation');

// Appel des routes pour les utilisateurs

Route::get('/formproduct', [produitcontroller::class, 'formproduct'])->name('formproduct');
Route::get('/CreateInfoProduit', [produitcontroller::class, 'createinfo'])->name('CreateInfoProduit');
Route::post('/AddProduit',[produitController::class, 'AddProduit'])->name('AddProduit');
Route::get('/searchprodupd/{id}', [produitcontroller::class, 'searchprodupd'])->name('searchprodupd');
Route::post('/modproduit',[produitController::class, 'modproduit'])->name('modproduit');

});



Route::get('/secretaire', function () {
    return view('secretaire');
})->name('secretaire');


// Appel des routes pour la categorie



Route::delete('/logout', [usercontroller::class, 'logout'])->name('logout');
Route::get('/logout', [usercontroller::class, 'logout'])->name('logout');




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/login', [usercontroller::class, 'login'])->name('login');



Route::get('/detailprod/{id}', [produitcontroller::class, 'detailprod'])->name('detailprod');


Route::get('/signin', [usercontroller::class, 'signin'])->name('signin');

Route::post('/createuser', [usercontroller::class, 'createuser'])->name('createuser');

Route::post('/loginuser', [usercontroller::class, 'loginuser'])->name('loginuser');


Route::get('/acceuill', function () { return view('acceuill');})->name('acceuill')->middleware("auth");

Route::get('/guest', function () { return view('guestcontain');})->name('guestmain');

Route::get('/cardshopping',[produitcontroller::class, 'cartaff']  )->name('cartshopping');
Route::get('/payer', function () { return view('payement');});



Route::get('/maincontain', [produitcontroller::class, 'ListeP'])->name('ListeP');
Route::get('/', [produitcontroller::class, 'ListeP'])->name('ListeP');

Route::get('/addtocard/{id}', [produitcontroller::class, 'addtocard'])->name('addtocard');
// Route::get('/addtocard1/{id}', [produitcontroller::class, 'addtocard1'])->name('addtocard1');
Route::get('/addtocard1/{id}/{etat}', [produitcontroller::class, 'addtocard1'])->name('addtocard1');

// Route::get('/minusfromcard/{id}', [produitcontroller::class, 'minusfromcard'])->name('addtocard');
Route::get('/minusfromcard/{id}/{etat}', [produitcontroller::class, 'minusfromcard'])->name('minusfromcard');

Route::get('/produitcate/{id}/{name}', [produitcontroller::class, 'produitcate'])->name('produitcate');

Route::get('/produitsubcate/{id}/{name}', [produitcontroller::class, 'produitsubcate'])->name('produitsubcate');


Route::post('/addtocart2', [produitcontroller::class, 'addtocart2'])->name('addtocart2');

Route::post('/ajoutcommandenv', [produitcontroller::class, 'ajoutcommandenv'])->name('ajoutcommandenv');

Route::get('/suprimerprodcard/{id}/{etat}', [produitcontroller::class, 'suprprodcard'])->name('suprprodcard');


Route::get('/listep', [produitcontroller::class, 'Listep2'])->name('listep2');
Route::get('/tableInfoProduit', [produitcontroller::class, 'tableinfo'])->name('tableInfoProduit');
Route::post('/update-cart', [produitcontroller::class, 'update']);
Route::get('/suprcart', [produitcontroller::class, 'suprcart'])->name('suprcart');


Route::get('/header-data', [produitcontroller::class, 'index']);
Route::get('/cartupdate', [produitcontroller::class, 'cartupdate']);


Route::post('/listuser', [produitcontroller::class, 'listuser'])->name('listuser');
Route::get('/test', function () {
    $produits = Produit::with(['Caracteristique', 'Categorie', 'Images'])->get();

        // Passer les options à la vue
        return view('test', ['produits' => $produits]);
})->name('test');

Route::get('/finaliser', function () {
    $villes = Localisation::all();
    $produits=session()->get('cart', []);
    $myArray = session()->get('myArray', []);
    $souscategories1 = Categorie::orderBy('created_at', 'desc') 
    ->get();
    $souscategories = Categorie::orderBy('created_at', 'desc')
    ->limit(5)
    ->get(); 
    $categories23 = Categorie::orderBy('created_at', 'desc') 
    ->limit(10)
    ->get();
        // Passer les options à la vue
        return view('payement', ['villes' => $villes,'produits' => $produits,'categories23'=>$categories23,'souscategories1'=>$souscategories1,'souscategories'=>$souscategories]);
})->name('final');

Route::post('/options', [usercontroller::class, 'getoptions'])->name('options');
Route::get('/achat', function () {

        // Passer les options à la vue
        return view('Achat.Achat');
});

Route::get('/formachat', [achatcontroller::class, 'formachat'])->name('formachat');
Route::get('/ajoutlivraison', [achatcontroller::class, 'ajoutlivraison'])->name('ajoutlivraison');
Route::get('/listetraiter', [notificationcontroller::class, 'listetraiter'])->name('listetraiter');
Route::get('/listenotif', [notificationcontroller::class, 'liste'])->name('listenotif');
Route::post('/lirenotif', [notificationcontroller::class, 'lirenotif'])->name('lirenotif');
Route::post('/traiternotif', [notificationcontroller::class, 'traiternotif'])->name('traiternotif');
Route::get('/listecom', [notificationcontroller::class, 'listecom'])->name('listecom');


Route::get('/achatsecre', [achatcontroller::class, 'achatsecre'])->name('achatsecre');
Route::get('/ventesecre', [achatcontroller::class, 'ventesecre'])->name('ventesecre');

Route::post('/formachat2', [achatcontroller::class, 'Formachat2'])->name('Formachat2');
Route::post('/formachatsecre', [achatcontroller::class, 'Formachatsecre'])->name('Formachatsecre');
Route::post('/formventesecre', [achatcontroller::class, 'Formventesecre'])->name('Formventesecre');

Route::get('/listepublicite',[produitcontroller::class, 'ListePublicite'])->name('listepublicite');
Route::get('/formpublicite',[produitcontroller::class, 'formpublicite'])->name('formpublicite');
Route::post('/addpublicite', [produitcontroller::class, 'addpub'])->name('addpublicite');
Route::get('/Supprimerpublicite/{id}',[produitcontroller::class, 'Supprimerpub'])->name('Supprimerpublicite');

