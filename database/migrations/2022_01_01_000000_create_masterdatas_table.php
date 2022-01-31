<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterdatasTable extends Migration
{
    public function up()
    {
        // Master Data Education
        Schema::create('md_education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('education_name');
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        // Master Data Religion
        Schema::create('md_religions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('religion_name');
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        // Master Data Employee Status
        Schema::create('md_employee_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_status_name');
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        // Master Data Normative Type
        Schema::create('md_normative_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('normative_type_name');
            $table->unsignedSmallInteger('max_normative')->nullable();
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        // Master Data Gender
        Schema::create('md_genders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gender_name');
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        // Master Data Bloods Type
        Schema::create('md_blood_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('blood_type_name');
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        // Master Data Marriage Status
        Schema::create('md_marriage_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marriage_status_name');
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        // Master Data Reason Status
        Schema::create('md_reason_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reason_status_name');
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        // Master Data Reason Status
        Schema::create('md_family_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('family_status_name');
            $table->unsignedSmallInteger('status');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('md_education');
        Schema::dropIfExists('md_religions');
        Schema::dropIfExists('md_employee_statuses');
        Schema::dropIfExists('md_normative_types');
        Schema::dropIfExists('md_genders');
        Schema::dropIfExists('md_blood_types');
        Schema::dropIfExists('md_marriage_statuses');
        Schema::dropIfExists('md_reason_statuses');
        Schema::dropIfExists('md_family_statuses');
    }
}
