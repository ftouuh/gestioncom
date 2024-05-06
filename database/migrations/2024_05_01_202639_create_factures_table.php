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
            $table->string('facture_numero');
            $table->date('date_commande');
            $table->string('societe');
            $table->string('ice');
            $table->json('products');
            $table->string('mode_reglement');
            $table->decimal('versement', 10, 2); // Assuming decimal field for monetary values
            $table->decimal('reste', 10, 2);
            $table->string('saisi_par');
            $table->timestamp('date_facture')->nullable();
            $table->decimal('total_TTC', 10, 2);
            $table->decimal('TVA', 5, 2);
            $table->decimal('total_HT', 10, 2);
            $table->string('str_ttc');
            $table->unsignedBigInteger('id_client');
            $table->foreign('id_client')->references('id')->on('clients')->ondelete('cascade');

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
