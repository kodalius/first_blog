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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index('comments_user_idx');
            $table->unsignedBigInteger('post_id')->index('comments_post_idx');
            $table->text('message');
            $table->timestamps();

            $table->foreign('user_id','comments_user_fk')->on('users')->references('id');
            $table->foreign('post_id','comments_post_fk')->on('posts')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
