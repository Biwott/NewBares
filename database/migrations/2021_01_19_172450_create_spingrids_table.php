<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpingridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spingrids', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->decimal('loss', 11, 2)->default(0.00);
            $table->decimal('gain', 11, 2)->default(0.00);
            $table->unsignedBigInteger('count')->default(0);                  
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
        Schema::dropIfExists('spingrids');
    }
}
