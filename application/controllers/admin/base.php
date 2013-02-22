<?php

class Admin_Base_Controller extends Controller
{

	public $layout = 'layouts.boilerplate';
	public $restful = true;
	public function __construct()
	{
		parent::__construct();
		
		$this->filter('before', 'auth');
		//$this->filter('before', 'csrf')->on('post');
		
		$this->layout->title = 'no title set';
		$this->layout->content = View::make('admin.template');
		$this->layout->content->content = 'no content set';
	}

	public function after($response)
	{
		parent::after($response);

		Asset::add('admin.styles.css', 'css/admin/styles.css');	
		Asset::add('CKE-editor-JS', 'js/vendor/ckeditor/ckeditor.js');

		Asset::add('admin.jquery.ui.js', 'js/vendor/jquery-ui-1.8.23.custom.min.js');
		Asset::add('admin.jquery.theme.css', 'css/admin/smoothness/jquery-ui-1.8.23.custom.css');
		Asset::add('sortable', 'js/vendor/jquery.mjs.nestedSortable.js');
		Asset::add('admin.application.js', 'js/admin/application.js');	

	}

	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}