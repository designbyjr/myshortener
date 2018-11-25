<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('stats', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('urls_id');
			$table->bigInteger('statcount');
			$table->timestamps();
			$table->foreign('urls_id')->references('id')->on('urls');
		});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('stats');
    }
}
