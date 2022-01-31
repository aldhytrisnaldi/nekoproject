<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('departement_name');
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('divisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('departement_id');
            $table->string('division_name');
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('positions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('division_id');
            $table->string('position_name');
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departements');
        Schema::dropIfExists('divisions');
        Schema::dropIfExists('positions');
    }
}
