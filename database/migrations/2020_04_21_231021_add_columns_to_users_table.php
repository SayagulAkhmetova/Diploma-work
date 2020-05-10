<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('head_of_department')->nullable();
            $table->string('department')->nullable();
            $table->string('title')->nullable();
            $table->string('degree')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('head_of_department');
            $table->dropColumn('department');
            $table->dropColumn('title');
            $table->dropColumn('degree');
        });
    }
}
