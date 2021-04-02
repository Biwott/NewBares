<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVidpacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vidpacks', function (Blueprint $table) {
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
            $table->unsignedBigInteger('cost')->default(0);
            $table->unsignedBigInteger('earning')->default(0);
            $table->unsignedBigInteger('commision')->default(0);
            $table->unsignedBigInteger('count')->default(1);
            $table->unsignedBigInteger('slot')->default(1);
            $table->unsignedBigInteger('chances')->default(1);
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
        Schema::dropIfExists('vidpacks');
    }
}
