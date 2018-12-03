<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPicbetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_picbets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('start_date');
            $table->string('end_date');
            $table->string('ticketCost');
            $table->string('totalSold');

            $table->string('boardA');
            $table->string('boardB');
            $table->string('boardC');
            $table->string('boardD');
            $table->string('boardE');

            $table->string('prizeOne');
            $table->string('prizeTwo');
            $table->string('prizeThr');
            $table->string('prizeFor');
            $table->string('status');

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
        Schema::dropIfExists('admin_picbets');
    }
}
