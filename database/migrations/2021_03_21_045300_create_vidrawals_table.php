<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVidrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vidrawals', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->decimal('amount');
            $table->string('details')->nullable();
            $table->tinyInteger('status')->default(0);
            //Foreign Keys 
            $table->unsignedBigInteger('user_id')->default('0');
            $table->index('user_id');  
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vidrawals');
    }
}
