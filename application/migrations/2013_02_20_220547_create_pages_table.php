<?php

class Create_Pages_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pages', function($table)
        {
            $table->create();
            
            $table->increments('id');
            
            $table->integer('parent_id')->nullable();
            //$table->foreign('parent_id')->references('id')->on('pages')->on_update('cascade');
            $table->boolean('is_active')->default(1);
            $table->boolean('in_menu')->default(1);
            $table->string('identifier');
            $table->string('pathto');
            $table->string('menu_name');
            $table->string('title');
            $table->text('content');
            $table->string('meta_title')->nullable();
            $table->integer('order')->default(9999);
            $table->timestamps();
        });

        Page::create(array(
        	'identifier'	=>'home',
        	'pathto'		=>'home',
        	'menu_name'		=>'Home',
        	'title'			=>'Home',
        	'content'		=>'Dit is de Homepage',
        	'order'			=>1,
        ));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}