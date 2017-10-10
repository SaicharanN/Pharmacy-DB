<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Patient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient',function($t){
            $t->integer('Ptid');
            $t->string('PName');
            $t->string('Sex');
            $t->integer('Age');
            $t->string('Contact');
            $t->string('Address');
            $t->timestamps();

            $t->primary('Ptid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patient');
    }
}
