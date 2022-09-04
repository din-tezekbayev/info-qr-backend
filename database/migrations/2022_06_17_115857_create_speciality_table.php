<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialityTable extends Migration
{
    public function up()
    {
        Schema::create('specialities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_id');
            $table->string('title');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('specialities');
    }
}
