<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMenuTypeTables extends Migration
{
    public function up()
    {
        Schema::create('m_menu_type_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('menu_type_name');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_menu_type_tables');
    }
}
