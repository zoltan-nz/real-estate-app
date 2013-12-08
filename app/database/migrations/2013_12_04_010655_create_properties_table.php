<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
      $table->text('details')->nullable();
      $table->integer('price');
      $table->integer('sales_type_id')->nullable();
      $table->integer('county_id')->nullable();
      $table->integer('city_id')->nullable();
      $table->integer('house_type_id')->nullable();
      $table->string('address_1')->nullable();
      $table->string('address_2')->nullable();
      $table->string('address_3')->nullable();
      $table->integer('number_of_beds')->nullable();
      $table->integer('number_of_baths')->nullable();
      $table->boolean('pet_allowed')->default(0);
      $table->boolean('dishwasher')->default(0);
      $table->boolean('furnished')->default(0);
      $table->boolean('sold')->default(0);
      $table->string('picture')->nullable();
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
		Schema::drop('properties');
	}

}
