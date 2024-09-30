<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['libelle','categorie_id','description','qttestock','qttestockbonetat'.'qttestocketatcorrect','prix','prixbonetat','prixetatcorrect'];

    public function souscategorie(){
        return $this->belongsTo(SousCategorie::class);
    }

    public function categorie(){
        return $this->BelongsTo(Categorie::class);
    }

    public function infosproduits(){
        return $this->hasMany(Infosproduit::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }

    public function caracteristique()
    {
        return $this->belongsToMany(Caracteristique::class,'produitcaras');
    }

    public function achat()
    {
        return $this->belongsToMany(achat::class,'produitachats');
    }

    public function commandenvs(){
        return $this->hasMany(Commandenv::class);
    }

    public function achatsecres(){
        return $this->hasMany(Achatsecre::class);
    }

    public function ventesecres(){
        return $this->hasMany(Ventesecre::class);
    }

   

    
}


