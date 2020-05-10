<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_educations', function (Blueprint $table) {
            $table->id();

            $table->string('year')->nullable();

            $table->unsignedBigInteger('user_id');

            $table->string('one_title')->nullable();
            $table->string('one_number')->nullable();
            $table->string('one_language')->nullable();
            $table->string('one_date')->nullable();
            $table->boolean('one_execution')->nullable();

            $table->string('two_type')->nullable();
            $table->string('two_title')->nullable();
            $table->string('two_size')->nullable();
            $table->string('two_deadline')->nullable();
            $table->string('two_coauthor')->nullable();
            $table->string('two_publishing')->nullable();
            $table->boolean('two_execution')->nullable();

            $table->string('three_type')->nullable();
            $table->string('three_aim')->nullable();
            $table->string('three_period')->nullable();
            $table->boolean('three_execution')->nullable();

            $table->string('four_title')->nullable();
            $table->string('four_type')->nullable();
            $table->string('four_topic')->nullable();
            $table->string('four_group')->nullable();
            $table->string('four_date')->nullable();
            $table->boolean('four_execution')->nullable();

            $table->string('five_name')->nullable();
            $table->string('five_title')->nullable();
            $table->string('five_topic')->nullable();
            $table->string('five_date')->nullable();
            $table->string('five_assessment')->nullable();
            $table->boolean('five_execution')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_educations');
    }
}
