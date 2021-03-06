<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outorders', function (Blueprint $table) {
            $table->id();
            $table->string('vendor');
            $table->string('delivery_address');
            $table->string('order_code');
            $table->string('reference_code');
            $table->string('date');
            $table->string('delivery_date');
            $table->integer('items_id');
            $table->integer('quantity');
            $table->string('currency');
            $table->float('amount');
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
        Schema::dropIfExists('outorders');
    }
}
