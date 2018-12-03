<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerTdbetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_tdbets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('betType');

            $table->string('betTimes');

            $table->string('totalCost');

            $table->string('boardA');
            $table->string('boardB');
            $table->string('boardC');

            $table->string('ticketID');
            $table->string('role');
            $table->string('buyerID');

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
        Schema::dropIfExists('buyer_tdbets');
    }
}
