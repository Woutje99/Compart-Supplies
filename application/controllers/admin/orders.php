<?php

class Admin_Orders_Controller extends Admin_Base_Controller
{
	public function get_index()
	{
		$this->layout->title				=	'Orders overzicht';
		$this->layout->content->title		= 	'Orders overzicht';
		$this->layout->content->content		=	View::make('admin.orders_overview');
													
	}

	public function get_order()
	{

	}

	public function get_delete_order()
	{

	}
}