<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('organization_feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('branch_id');
            $table->string('comment');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organization_feedback');
    }
}
