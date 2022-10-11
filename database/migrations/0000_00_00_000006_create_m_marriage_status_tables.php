<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMarriageStatusTables extends Migration
{
    public function up()
    {
        Schema::create('m_marriage_status_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marriage_status_name');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_marriage_status_tables');
    }
}
