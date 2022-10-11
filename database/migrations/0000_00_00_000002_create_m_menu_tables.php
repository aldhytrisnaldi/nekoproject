<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMenuTables extends Migration
{
    public function up()
    {
        Schema::create('m_menu_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('menu_name');
            $table->unsignedBigInteger('menu_type_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedSmallInteger('sort');
            $table->string('route');
            $table->string('icon')->nullable();
            $table->longText('description')->nullable();
            $table->integer('active')->default(1);
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('m_menu_tables');
            $table->foreign('menu_type_id')->references('id')->on('m_menu_type_tables');
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_menu_tables');
    }
}
