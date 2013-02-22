<?php
class Admin_Users_Controller extends Admin_Base_Controller
{
	public $restful = true;

	public function get_index()
	{
		$this->layout->title				=	'Gebruikers overzicht';
		$this->layout->content->title		= 	'Gebruikers overzicht';
		$this->layout->content->content		=	View::make('admin.users_overview')
													->with('users', User::all());
	}
	
	public function post_edit($id = null)
	{
		$user = null;
		if(!is_null($id))
		{
			$user = User::find($id);
		}
		if (is_null($user))
		{
			$user = new User();
		}
		// Declare the rules for the form validation	
		$rules = array(
			'username'		=>	'required',
			'password' 		=>	'required',
			'email' 		=> 	'required|email'
		);

		//Get all the inputs
		$inputs = Input::all();

		//Validate the inputs
		$validator = Validator::make($inputs, $rules);

		//Check if the form validation with success
		if($validator->passes())
		{
			// Create the user
			//$user = new User;
			$user->username		=	Input::get('username');
			$user->email		=	Input::get('email');

			if(Input::has('password'))
			{
				$user->password	=	Hash::make(Input::get('password'));
			}

			$user->save();

			Notices::add('success', 'Gebruiker `' . $user->username . '` opgeslagen.');
			return Redirect::to('admin/users');
		}
		else 
		{ 	
			return Redirect::to_action('admin.users@edit', array($user->id))->with_errors($validator);
		}
	}

	public function get_edit($id = null)
	{
		$user = null;
		if(!is_null($id))
		{
			$user = User::find($id);
		}

		if (is_null($user))
		{
			$user = new User();
		}

		$this->layout->title				=	'Gebruiker toevoegen';
		$this->layout->content->title		=	'Gebruiker toevoegen';
		$this->layout->content->content		=	View::make('admin.users_edit')
													->with('user', $user);
	}

	public function get_delete($id = null)
	{
		$user = User::find($id);

		if(is_null($user))
		{
			Notices::add('error', 'De gebruiker kan niet worden gevonden');
			return Redirect::to('admin/users');
		}
		elseif($user->username == 'wouterh')
		{
			Notices::add('error', 'Deze gebruiker mag niet worden verwijderd');
			return Redirect::to('admin/users');
		}

		$user->delete();

		Notices::add('success', 'Gebruiker `' . $user->username . '` verwijderd.');
		return Redirect::to('admin/users');
	}

	public function get_info($id = null)
	{
		$user = User::find($id);

		$this->layout->title				=	'Gebruikers informatie';
		$this->layout->content->content		=	View::make('admin.users_info')
													->with('user', $user);

		Asset::add('colorbox-css', 'js/vendor/colorbox/colorbox.css');	
		Asset::add('colorbox-js-min', 'js/vendor/colorbox/jquery.colorbox-min.js');	
		Asset::add('colorbox-js', 'js/vendor/colorbox/jquery.colorbox.js');													
	}
}