<?php

class Create_Products_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table)
		{
			$table->increments('id_product');

			$table->integer('id');
			$table->string('merk');
			$table->string('details');
			$table->string('model');
			$table->string('prijs');

			$table->integer('S_N');
			$table->string('brand_name');
			$table->string('model_name');
			$table->string('price_in_rupee');


			$table->integer('stock');
			$table->string('image');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}