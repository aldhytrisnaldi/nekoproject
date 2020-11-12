<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone')->unique;
            $table->string('email')->unique;
            $table->date('dateofbirth');
            $table->string('placeofbirth');
            $table->string('province');
            $table->string('city');
            $table->string('districts');
            $table->string('subdistricts');
            $table->longtext('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
