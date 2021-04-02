<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 20, 2);
            $table->text('session')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('reference')->nullable();
            $table->string('details');
            //Foreign Keys
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('method_id');
            $table->index('user_id');
            $table->index('method_id');
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
        Schema::dropIfExists('deposits');
    }
}
