<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchAditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_aditionals', function (Blueprint $table) {
            $table->id();

            $table->string('year')->nullable();

            $table->unsignedBigInteger('user_id');

            $table->string('one_type')->nullable();
            $table->string('one_country')->nullable();
            $table->string('one_event')->nullable();
            $table->string('one_position')->nullable();
            $table->string('one_date')->nullable();
            $table->boolean('one_execution')->nullable();


            $table->string('two_type')->nullable();
            $table->string('two_country')->nullable();
            $table->string('two_event')->nullable();
            $table->string('two_position')->nullable();
            $table->string('two_date')->nullable();
            $table->boolean('two_execution')->nullable();

            $table->string('three_type')->nullable();
            $table->string('three_place')->nullable();
            $table->string('three_aim')->nullable();
            $table->string('three_funding')->nullable();
            $table->boolean('three_execution')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_aditionals');
    }
}
