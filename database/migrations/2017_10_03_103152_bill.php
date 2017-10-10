<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill',function($t){
            $t->integer('BillId');
            $t->integer('Pid');
            $t->integer('BillAmount');
            $t->integer('Eid');
            $t->timestamps();

            $t->primary('BillId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bill');
    }
}
