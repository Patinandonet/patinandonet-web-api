<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlite')->create('activities', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->primary('id');
            $table->timestamps();
            $table->bigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->bigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->bigInteger('day_id');
            $table->foreign('day_id')->references('id')->on('days');
            $table->bigInteger('hour_id');
            $table->foreign('hour_id')->references('id')->on('hours');
            $table->bigInteger('instructor_id');
            $table->foreign('instructor_id')->references('id')->on('instructors');
            $table->integer('places_available');
            $table->integer('free_places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sqlite')->dropIfExists('activities');
    }
}
