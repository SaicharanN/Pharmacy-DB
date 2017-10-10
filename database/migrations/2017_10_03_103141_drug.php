<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug',function($t){
            $t->integer('DrugId');
            $t->string('DrugName');
            $t->string('Quantity');
            $t->integer('Price');
            $t->timestamps();

            $t->primary('DrugId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drug');
    }
}
