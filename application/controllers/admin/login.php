<?php

class Admin_Login_Controller extends Controller
{
	public $restful	=	true;
	public $layout	=	'layouts.boilerplate';

	/*
	* Titel setten van de pagina
	* View aanmaken voor de login pagina
	* Error in de content laten zien als er fout wordt ingelogd
	*/
	public function get_index()
	{
		//return 'Wouter';
		
		$this->layout->title			=	'Inloggen - Content Management System - ComPart Supplies';
		$this->layout->content			=	View::make('admin.login');
		$this->layout->content->error	=	Session::get('error');
	}

	/*
	* Input waarden ophalen uit de username en password fields
	* Controleren in de database of het bestaat
	* TRUE: Wordt je geredirect in het CMS naar het dashboard
	* FALSE: Terug gestuurd worden naar het login formulier met een foutmelding
	*/
	public function post_index()
	{
		$username	 = Input::get('username');
		$password	 = Input::get('password');


		$credentials = array(
			'username'	 => $username,
			'password'	 => $password
		);

		if( Auth::attempt($credentials) )
		{
			return Redirect::to('admin/dashboard/index');
		}
		else
		{
			return Redirect::to('admin/login')->with('error', 'Gebruikersnaam en wachtwoord komen niet overeen.');
		}
	}

	/*
	* Functie om in het content management systeem uit te loggen
	* Uitloggen gebeurd wanneer er op de knop uitloggen wordt gedrukt!
	*/
	public function get_logout()
	{
		Auth::logout();

		return Redirect::to('/admin/login');
	}

}