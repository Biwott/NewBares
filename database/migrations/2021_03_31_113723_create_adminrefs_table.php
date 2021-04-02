<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminrefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminrefs', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->decimal('amount');
            $table->integer('level');
            //Indexes
            $table->integer('user_id');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('adminrefs');
    }
}
