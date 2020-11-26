<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table)  {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rin');
            $table->unsignedBigInteger('ein');
            $table->string('name');
            $table->enum('gender', ['Laki - laki', 'Perempuan']);
            $table->enum('religion', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu', 'Atheis', 'Lainya']);
            $table->integer('height');
            $table->integer('weight');
            $table->string('placeofbirth');
            $table->date('dateofbirth');
            $table->enum('marriage_status', ['Belum Menikah', 'Menikah', 'Janda', 'Duda']);
            $table->integer('number_of_children');
            $table->string('province');
            $table->string('city');
            $table->string('districts');
            $table->string('subdistricts');
            $table->longtext('address');
            $table->string('phone')->unique;
            $table->string('email')->unique;
            $table->unsignedInteger('departement_id');
            $table->unsignedInteger('division_id');
            $table->unsignedInteger('position_id');
            $table->timestamps();
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
