<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pair_id');
            $table->decimal('amount', 11, 4)->default(0.00);
            $table->string('reference');
            $table->decimal('buy_price', 11, 4)->default(0.00);
            $table->decimal('buy_price_exchange', 11, 4)->default(0.00);
            $table->decimal('sell_price', 11, 4)->default(0.00);
            $table->decimal('sell_price_exchange', 11, 4)->default(0.00);
            $table->decimal('gain', 11, 4)->default(0.00);
            $table->decimal('gain_exchange', 11, 4)->default(0.00);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('trades');
    }
}
