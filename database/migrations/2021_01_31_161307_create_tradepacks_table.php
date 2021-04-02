<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradepacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tradepacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('feateure1')->nullable();
            $table->string('feateure2')->nullable();
            $table->string('feateure3')->nullable();
            $table->string('feateure4')->nullable();
            $table->string('feateure5')->nullable();
            $table->string('feateure6')->nullable();
            $table->string('feateure7')->nullable();
            $table->string('feateure8')->nullable();
            $table->integer('cost')->default(0);
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
        Schema::dropIfExists('tradepacks');
    }
}
