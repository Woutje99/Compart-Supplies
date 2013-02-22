<?php

class Admin_Products_Controller extends Admin_Base_Controller
{
	
	public function get_index()
	{
		$this->layout->title					=	'Producten overzicht';
		$this->layout->content->title			=	'Producten overzicht';
		$this->layout->content->content			=	View::make('admin.products_overview')
														->with('products', Product::all());
	}

	public function post_edit($id = null)
	{
		$product = null;
		if(!is_null($id))
		{
			$product = Product::find($id);
		}

		if (is_null($product))
		{
			$product = new Product();
		}

		// Declare the rules for the form validation	
		$rules = array(
			'merk'			=>	'required',
			'details' 		=>	'required',
			'model' 		=> 	'required',
			'prijs'			=>	'required',
			'stock'			=>	'required'
		);

		//Get all the inputs
		$inputs = Input::all();

		//Validate the inputs
		$validator = Validator::make($inputs, $rules);

		//Check if the form validation with success
		if($validator->passes())
		{
			// Create the user
			//	$product = new Product;
			$product->merk			=	Input::get('merk');
			$product->details		=	Input::get('details');
			$product->model			=	Input::get('model');
			$product->prijs			=	Input::get('prijs');
			$product->stock			=	Input::get('stock');
/*			$product->image			=	Input::get('image');
*/
			$product->save();

			return Redirect::to_action('admin.products@index');
		}
		else 
		{ 	
			return Redirect::to_action('admin.products@edit', array($product->id))->with_errors($validator);
		}
	}

	public function get_edit($id = null)
	{
		$product = null;
		if(!is_null($id))
		{
			$product = Product::find($id);
		}

		if (is_null($product))
		{
			$product = new Product();
		}

		$this->layout->title				=	'Product bewerken';
		$this->layout->content->title		=	'Product bewerken';
		$this->layout->content->content		=	View::make('admin.products_edit')
													->with('product', $product);
	}
}