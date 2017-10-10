<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drugsinbill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugsinbill',function($t){
            $t->integer('Billid');
            $t->integer('Drugid');
            $t->integer('Quantity');
            $t->timestamps();

            $t->primary(array('Billid','Drugid'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drugsinbill');
    }
}
