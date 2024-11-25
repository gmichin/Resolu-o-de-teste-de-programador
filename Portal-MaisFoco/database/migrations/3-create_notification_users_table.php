<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('notification_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notification_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('seen')->default(false);
            $table->timestamp('date_seen')->nullable();
            $table->timestamps();
    
            $table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade');
        });
    }
    



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_users');
    }
};
