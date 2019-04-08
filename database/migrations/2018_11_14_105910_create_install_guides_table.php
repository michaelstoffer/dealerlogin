<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallGuidesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('install_guides', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('line_id')->nullable();
			$table->string('name');
			$table->string('years')->nullable();
			$table->string('pdf')->nullable();
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
		Schema::dropIfExists('install_guides');
	}
}
