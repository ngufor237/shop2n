<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandenvs', function (Blueprint $table) {
            $table->id();
            $table->decimal('prix', 20, 2); 
            $table->integer('qtte');
            $table->string('etat');
            $table->foreignId('auteur_id')->constrained('auteurs')->cascadeOnDelete();
            $table->foreignId('produit_id')->constrained('produits')->cascadeOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandenvs');
    }
};
