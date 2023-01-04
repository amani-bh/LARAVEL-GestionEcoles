<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_evenement', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('club_id');
            $table->unsignedBigInteger('evenement_id');
            $table->timestamps();

            $table->foreign('club_id')->references('id')
                ->on('clubs')->onDelete('cascade');
            $table->foreign('evenement_id')->references('id')
                ->on('evenements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_evenement');
    }
};
