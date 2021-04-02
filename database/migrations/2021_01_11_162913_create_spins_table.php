<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->decimal('min_amount', 11, 2)->default(0.00);
            $table->decimal('max_amount', 11, 2)->default(0.00);
            $table->dateTime('spin_from');
            $table->dateTime('spin_to');
            $table->decimal('spin_limit', 11, 2)->default(0.00);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('spins');
    }
}
