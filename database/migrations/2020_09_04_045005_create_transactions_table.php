<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(0)->index();
            $table->integer('total_money')->default(0);
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('street_address');
            $table->integer('city');
            $table->integer('district');
            $table->integer('ward');
            $table->string('note')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('payment_method')
                ->default(1)
                ->comment('1. COD, 2. Online');
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
        Schema::dropIfExists('transactions');
    }
}
