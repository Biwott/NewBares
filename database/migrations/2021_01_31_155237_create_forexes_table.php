<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forexes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->decimal('amount', 11, 2)->default(0.00);
            $table->decimal('cost', 11, 2)->default(0.00);
            $table->decimal('result', 11, 2)->default(0.00);
            $table->dateTime('trade_open');
            $table->dateTime('trade_close');
            $table->tinyInteger('status')->default(1);
            //foreign Keys
            $table->integer('tradepack_id');
            $table->integer('pair_id');
            $table->index('tradepack_id');
            $table->index('pair_id');
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
        Schema::dropIfExists('forexes');
    }
}
