<?php

class Base_Controller extends Controller
{
	public $layout = 'layouts.boilerplate';
	public $restful = true;

	public function __construct()
	{
		parent ::__construct();
		$this->layout->title				=	'No title set';
		$this->layout->content				=	View::make('template');
		$this->layout->content->content		=	'No content set';

	}

/*		public $layout = 'layouts.boilerplate';
	public $restful = true;
	public function __construct()
	{
		parent::__construct();
		
		$this->filter('before', 'auth');
		//$this->filter('before', 'csrf')->on('post');
		
		$this->layout->title = 'no title set';
		$this->layout->content = View::make('admin.template');
		$this->layout->content->content = 'no content set';
	}*/

	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}