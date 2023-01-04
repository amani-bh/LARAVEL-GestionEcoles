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
        Schema::create('comment_blogs', function (Blueprint $table) {
            $table->id();
            $table->text('contenu');
            $table->timestamps();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('blog_id')
                ->references('id')
                ->on('blogs')
                ->constrained('blogs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_blogs');
    }
};
