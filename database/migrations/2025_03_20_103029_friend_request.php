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
        //

       Schema::create('friendRequest', function(Blueprint $table){
        $table->id();
        $table->int('requestId');
        $table->tinyInteger('senderId');
        $table->tinyInteger('receiverId');
        $table->string('request_status');
        $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
