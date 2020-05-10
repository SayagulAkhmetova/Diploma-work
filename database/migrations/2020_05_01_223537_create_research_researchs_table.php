<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchResearchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_researchs', function (Blueprint $table) {
            $table->id();

            $table->string('year')->nullable();

            $table->unsignedBigInteger('user_id');


            $table->string('one_one_title')->nullable();
            $table->string('one_one_type')->nullable();
            $table->string('one_one_language')->nullable();
            $table->string('one_one_data')->nullable();
            $table->string('one_one_date')->nullable();
            $table->boolean('one_one_execution')->nullable();


            $table->string('one_two_title')->nullable();
            $table->string('one_two_type')->nullable();
            $table->string('one_two_language')->nullable();
            $table->string('one_two_data')->nullable();
            $table->string('one_two_date')->nullable();
            $table->boolean('one_two_execution')->nullable();


            $table->string('one_three_title')->nullable();
            $table->string('one_three_type')->nullable();
            $table->string('one_three_language')->nullable();
            $table->string('one_three_data')->nullable();
            $table->string('one_three_date')->nullable();
            $table->boolean('one_three_execution')->nullable();


            $table->string('two_type')->nullable();
            $table->string('two_title')->nullable();
            $table->string('two_number')->nullable();
            $table->string('two_coauthor')->nullable();
            $table->string('two_date')->nullable();
            $table->boolean('two_execution')->nullable();

            $table->string('three_title')->nullable();
            $table->string('three_language')->nullable();
            $table->string('three_data')->nullable();
            $table->string('three_date')->nullable();
            $table->boolean('three_execution')->nullable();

            $table->string('four_university')->nullable();
            $table->string('four_country')->nullable();
            $table->string('four_title')->nullable();
            $table->string('four_date')->nullable();
            $table->boolean('four_execution')->nullable();

            $table->string('five_direction')->nullable();
            $table->string('five_title')->nullable();
            $table->string('five_position')->nullable();
            $table->string('five_funding')->nullable();
            $table->string('five_budget')->nullable();
            $table->string('five_date')->nullable();
            $table->boolean('five_execution')->nullable();

            $table->string('six_name')->nullable();
            $table->string('six_course')->nullable();
            $table->string('six_type')->nullable();
            $table->string('six_date')->nullable();
            $table->string('six_city')->nullable();
            $table->string('six_result')->nullable();
            $table->boolean('six_execution')->nullable();

            $table->string('seven_name')->nullable();
            $table->string('seven_date')->nullable();
            $table->string('seven_place')->nullable();
            $table->boolean('seven_execution')->nullable();

            $table->string('eight_one_title')->nullable();
            $table->string('eight_one_place')->nullable();
            $table->string('eight_one_form')->nullable();
            $table->boolean('eight_one_execution')->nullable();

            $table->string('eight_two_title')->nullable();
            $table->string('eight_two_place')->nullable();
            $table->string('eight_two_form')->nullable();
            $table->boolean('eight_two_execution')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_researchs');
    }
}
