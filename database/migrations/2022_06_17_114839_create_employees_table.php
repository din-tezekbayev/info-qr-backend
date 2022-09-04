<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->string('name');
            $table->string('img');
            $table->text('work_hours');
            $table->text('description')->comment('can contain html');
            $table->tinyInteger('experience')->unsigned();
            $table->unsignedBigInteger('speciality_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('cabinet_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
