<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarrantyContactsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('warranty_contacts', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('vendor_id');
			$table->string('phone')->nullable();
			$table->string('customer_service_phone')->nullable();
			$table->string('technical_support_phone')->nullable();
			$table->string('warranty_phone')->nullable();
			$table->string('customer_service_email')->nullable();
			$table->string('technical_support_email')->nullable();
			$table->string('warranty_email')->nullable();
			$table->string('website')->nullable();
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
		Schema::dropIfExists('warranty_contacts');
	}
}
