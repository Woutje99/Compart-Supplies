<?php

class Create_Suppliers_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suppliers', function($table)
		{
			$table->increments('id');
			$table->string('company_name');
			$table->string('address');
			$table->string('housenumber');
			$table->string('zip_code');
			$table->string('town');
			$table->string('email');
			$table->timestamps();
		});

		Supplier::create(array(
            'company_name' 		=>	'Nehru Place Market',
            'address' 			=>	'Grotestraat',
            'housenumber' 		=>	'15',
            'zip_code'			=>	'1234 AB',
            'town'				=>	'Shanghai',
            'email'				=>	'whaakmeester@gmail.com'
        ));

        Supplier::create(array(
            'company_name' 		=>	'PrintSupply',
            'address' 			=>	'Jan Steenstraat',
            'housenumber' 		=>	'16',
            'zip_code'			=>	'7556 GC',
            'town'				=>	'Hoofdorp',
            'email'				=>	'whaakmeester@gmail.com'
        ));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('suppliers');
	}

}