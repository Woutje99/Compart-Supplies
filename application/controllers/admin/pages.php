<?php

class Admin_Pages_Controller extends Admin_Base_Controller
{
	public $restful = true;

	public function get_index()
	{
		//return 'User pagina';
		$this->layout->title				=	'Paginas overzicht';
		$this->layout->content->title		= 	'Paginas overzicht';
		$this->layout->content->content		=	View::make('admin.pages_overview')
													->with('pages', Page::all());
	}

	public function post_edit($id = null)
	{	
		$page = Page::find($id);

		if (is_null($page))
		{
			$page = new Page();
			$page->is_active = 1;
		}

		$rules = array(
			'title'			=>	'required|min:3',
			'menu_name'		=>	'required|min:2',
			'identifier'	=>	'required|min:2',	
			'content'		=>	'required',
			'meta_title'	=>	'required|min:2'
		);

		//Get all the inputs
		$inputs = Input::all();

		//Validate the inputs
		$validator = Validator::make($inputs, $rules);

		//Check if the form validation with success
		if($validator->passes())
		{
			$page->title		=	Input::get('title');
			$page->menu_name	=	Input::get('menu_name');
			$page->identifier	=	Input::get('identifier');
			$page->content		=	Input::get('content');
			$page->meta_title	=	Input::get('meta_title');
			$page->is_active	=	Input::has('is_active') ? 1 : 0;
			$page->save();

			Notices::add('success', 'Pagina `' . $page->title . '` opgeslagen.');
			return Redirect::to('admin/pages');
		}
		else
		{
			return Redirect::to_action('admin.pages@edit', array($page->id))->with_errors($validator);
		}

	}

	public function get_edit($id = null)
	{
		$page = Page::find($id);

		if (is_null($page))
		{
			$page = new Page();
			$page->is_active	 = 1;
		}

		$this->layout->title				=	'Pagina toevoegen';
		$this->layout->content->title		=	'Pagina toevoegen';
		$this->layout->content->content		=	View::make('admin.pages_edit')
													->with('page', $page	);
	}

	public function get_delete($id = null)
	{
		$page = Page::find($id);

		$page->delete();

		Notices::add('success', 'Pagina `' . $page->title . '` verwijderd.');
		return Redirect::to('admin/pages');
	}
}