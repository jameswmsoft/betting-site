<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTdbetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_tdbets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('start_date');
            $table->string('end_date');
            $table->string('tDticketCost');
            $table->string('tDtotalSold');

            $table->string('tDboardA');
            $table->string('tDboardB');
            $table->string('tDboardC');

            $table->string('tDprizeOne');
            $table->string('tDprizeTwo');
            $table->string('tDprizeThr');

            $table->string('sDticketCost');
            $table->string('sDtotalSold');

            $table->string('sDboardA');
            $table->string('sDboardB');
            $table->string('sDboardC');

            $table->string('sDprizeOne');
            $table->string('sDprizeTwo');
            $table->string('sDprizeThr');

            $table->string('fDticketCost');
            $table->string('fDtotalSold');

            $table->string('fDboardA');
            $table->string('fDboardB');
            $table->string('fDboardC');

            $table->string('fDprizeOne');
            $table->string('fDprizeTwo');
            $table->string('fDprizeThr');

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
        Schema::dropIfExists('admin_tdbets');
    }
}
