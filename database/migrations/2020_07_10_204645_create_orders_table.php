<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("carrier_id")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->tinyInteger("priority")->default(1);
            $table->date("delivery_date");
            $table->timestamps();

            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('SET NULL')->onUpdate('SET NULL');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
