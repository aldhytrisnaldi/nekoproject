<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMIdentityTypeTables extends Migration
{
    public function up()
    {
        Schema::create('m_identity_type_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identity_type_name');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_identity_type_tables');
    }
}
