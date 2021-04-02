<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpinningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spinnings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('spin_id');
            $table->unsignedBigInteger('count');
            $table->string('type')->default('');
            $table->decimal('amount', 11, 2);
            $table->decimal('winning', 11, 2);
            $table->tinyInteger('status')->default(1);
            $table->index('user_id');
            $table->index('spin_id');
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
        Schema::dropIfExists('spinnings');
    }
}
