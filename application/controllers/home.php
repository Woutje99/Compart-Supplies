<?php

class Home_Controller extends Base_Controller
{
	public function get_index()
	{
		//return 'Homepagina';

		$this->layout->title				=	'Homepagina - ComPart Supplies - Webshop';
		$this->layout->content->title		=	'Homepagina - ComPart Supplies - Webshop';
		$this->layout->content->content		=	View::make('home');

	}

}