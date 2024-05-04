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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->date('date_commande');
            $table->integer('qte');
            $table->string('nom_client');
            $table->string('prenom_client');
            $table->json('products');
            $table->string('mode_reglement');
            $table->decimal('versement', 10, 2); // Assuming decimal field for monetary values
            $table->decimal('reste', 10, 2);
            $table->string('saisi_par');
            $table->timestamp('saisi_le')->nullable();
            $table->decimal('total_TTC', 10, 2);
            $table->decimal('TVA', 5, 2);
            $table->decimal('total_HT', 10, 2);
            $table->unsignedBigInteger('id_client');
            $table->foreign('id_client')->references('id')->on('clients')->ondelete('cascade');
            $table->unsignedBigInteger('id_produit');
            $table->foreign('id_produit')->references('id')->on('products')->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
