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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('content');
            $table->integer('like_count');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('attachment_id')->nullble();
            $table->timestamps();
            // 外部キ一制約
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('attachment_id')->references('id')->on('attachments');
        }) ;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
