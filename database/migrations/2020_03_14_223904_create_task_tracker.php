<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTracker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->collation('utf8_general_ci');
        });
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_status');
            $table->foreign('id_status')
                ->references('id')->on('statuses');
            $table->string('title', 50)->collation('utf8_general_ci');
            $table->text('description')->collation('utf8_general_ci');
            $table->timestamps();
        });
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_task');
            $table->foreign('id_task')
                ->references('id')->on('tasks');
            $table->text('description')->collation('utf8_general_ci');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('tasks');
    }
}
