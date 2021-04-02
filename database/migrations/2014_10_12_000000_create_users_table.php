<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->decimal('balance', 20, 2)->default(0.00);
            $table->decimal('vid_balance', 20, 2)->default(0.00);
            $table->decimal('trade_balance', 20, 2)->default(0.00);
            $table->text('summary')->nullable();
            $table->string('avatar')->nullable();
            $table->tinyInteger('dark_mode')->nullable();
            $table->tinyInteger('digest')->nullable();
            $table->string('locale')->nullable();
            $table->tinyInteger('role')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('vid_status')->default(1);
            $table->tinyInteger('trade_status')->default(1);
            $table->tinyInteger('package_status')->default(0);
            $table->tinyInteger('welcome_spin')->default(0);
            $table->tinyInteger('video_status')->default(0);
            $table->tinyInteger('active')->default(0);
            $table->string('verif_code')->nullable();
            $table->timestamp('verif_sent_at')->nullable();
            $table->tinyInteger('email_verified')->default(0);;
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('video_expiry_on')->nullable();
            $table->string('password');
            //Foreign Keys
            $table->integer('referer_id')->default(0);
            $table->integer('level_id')->default(1);
            $table->integer('currency_id')->default(1);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
            //Indexes
            $table->index('level_id');
            $table->index('referer_id');
            $table->index('currency_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
