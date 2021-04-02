<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->decimal('amount', 20, 2);
            $table->decimal('charge', 20, 2);
            $table->decimal('final_amount', 20, 2);
            $table->text('details')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamp('verified_at')->nullable();
            //Foreign Keys 
            $table->unsignedBigInteger('mpesa_id')->default('0');
            $table->unsignedBigInteger('user_id')->default('0');
            $table->unsignedBigInteger('currency_id')->default('0');
            $table->index('user_id');
            $table->index('mpesa_id');
            $table->index('currency_id');
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
        Schema::dropIfExists('withdrawals');
    }
}
