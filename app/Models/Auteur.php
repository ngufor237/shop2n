<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    use HasFactory;

    protected $fillable = ['nom','prenom','user_id','numero','email','contact_what','etat'];

    public function commandenvs(){
        return $this->hasMany(Commandenv::class);
    }
    public function userId(){
        return $this->belongsTo(User::class);
    }

}
