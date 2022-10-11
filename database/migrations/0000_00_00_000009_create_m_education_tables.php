<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMEducationTables extends Migration
{
    public function up()
    {
        Schema::create('m_education_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('education_name');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_education_tables');
    }
}
