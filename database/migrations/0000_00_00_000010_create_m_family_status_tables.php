<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMFamilyStatusTables extends Migration
{
    public function up()
    {
        Schema::create('m_family_status_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('family_status_name');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_family_status_tables');
    }
}
