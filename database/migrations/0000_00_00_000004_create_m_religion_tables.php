<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMReligionTables extends Migration
{
    public function up()
    {
        Schema::create('m_religion_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('religion_name');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_religion_tables');
    }
}
