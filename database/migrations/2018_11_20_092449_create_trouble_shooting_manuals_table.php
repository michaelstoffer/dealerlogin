<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTroubleShootingManualsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trouble_shooting_manuals', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('product_id');
			$table->string('name');
			$table->text('pdf')->nullable();
			$table->string('pdf_name')->nullable();
			$table->string('pdf_size')->nullable();
			$table->text('pdf_image')->nullable();
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
		Schema::dropIfExists('trouble_shooting_manuals');
	}
}
