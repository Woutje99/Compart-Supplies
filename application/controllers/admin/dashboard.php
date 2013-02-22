<?php

/**
 * Dashboard Module
 * 
 * Normally used for News or Information about this CMS
 * 
 */
class Admin_Dashboard_Controller extends Admin_Base_Controller
{
	
	/**
	 * Show the Dashboard
	 */
	public function get_index()
	{
		$this->layout->title = 'Dashboard';
		$this->layout->content->title = 'Dashboard';
		$this->layout->content->content = View::make('admin/dashboard_overview');
	}
}