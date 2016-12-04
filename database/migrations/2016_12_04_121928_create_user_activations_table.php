<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUserActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activations', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });

//        For activating the user
        Schema::table('users', function ($table) {
            $table->boolean('activated')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_activations');

        Schema::table('users', function ($table) {
            $table->dropColumn('activated');
        });
    }
}
