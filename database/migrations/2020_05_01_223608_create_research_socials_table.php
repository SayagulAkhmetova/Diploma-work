<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_socials', function (Blueprint $table) {
            $table->id();

            $table->string('year')->nullable();

            $table->unsignedBigInteger('user_id');

            $table->string('one_type')->nullable();
            $table->string('one_position')->nullable();
            $table->boolean('one_execution')->nullable();

            $table->string('two_type')->nullable();
            $table->string('two_position')->nullable();
            $table->boolean('two_execution')->nullable();

            $table->string('three_title')->nullable();
            $table->string('three_author')->nullable();
            $table->string('three_institution')->nullable();
            $table->boolean('three_execution')->nullable();

            $table->string('four_type')->nullable();
            $table->string('four_result')->nullable();
            $table->string('four_place')->nullable();

            $table->string('five_type')->nullable();
            $table->string('five_result')->nullable();
            $table->string('five_place')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_socials');
    }
}
