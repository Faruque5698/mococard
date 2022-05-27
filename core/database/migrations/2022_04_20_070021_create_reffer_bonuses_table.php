<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefferBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reffer_bonuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('new_user_id')->nullable();
            $table->unsignedBigInteger('refer_by_id')->nullable();
            $table->float('refer_bonus')->nullable();
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
        Schema::dropIfExists('reffer_bonuses');
    }
}
