<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTroubleShootingVideosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trouble_shooting_videos', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('product_id');
			$table->string('name');
			$table->text('video')->nullable();
			$table->string('video_name')->nullable();
			$table->string('video_size')->nullable();
			$table->text('video_code')->nullable();
			$table->text('embed')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('trouble_shooting_videos');
	}
}
