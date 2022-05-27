<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('card_id')->nullable();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->string('name')->nullable();
            $table->string('account_id')->nullable();
            $table->string('card_hash')->nullable();
            $table->string('card_pan')->nullable();
            $table->string('masked_card')->nullable();
            $table->string('cvv')->nullable();
            $table->string('expiration')->nullable();
            $table->string('card_type')->nullable();
            $table->string('name_on_card')->nullable();
            $table->string('callback')->nullable();
            $table->string('ref_id')->nullable();
            $table->string('secret')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->double('amount')->nullable();
            $table->string('currency')->nullable();
            $table->double('bg')->nullable();
            $table->double('charge')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('funding')->default(1);
            $table->tinyInteger('terminate')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('plan_id')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virtual_cards');
    }
}
