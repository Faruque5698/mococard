<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('card_issuance_fee');
            $table->double('card_load_fee');
            $table->double('card_load_fee_percentage');
            $table->double('min_load');
            $table->double('max_load');
            $table->tinyInteger('funding')->default(1);
            $table->tinyInteger('withdraw')->default(1);
            $table->tinyInteger('block')->default(0);
            $table->tinyInteger('terminate')->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('plans');
    }
}
