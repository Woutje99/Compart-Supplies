<?php

class Products_Controller extends Base_Controller
{
	public function get_index()
	{
		$this->layout->title				=	'Overzicht van de producten';
		$this->layout->content->title		=	'Overzicht van de producten';
		$this->layout->content->content		=	View::make('products')
													->with('products', Product::all());
	}

	public function post_product()
	{
		$product = Product::find($id);

		echo $product;
	}
	public function get_product()
	{
		$this->layout->title				=	'Product detail pagina';
		$this->layout->content->title		=	'Product detail pagina';
		$this->layout->content->content		=	View::make('product_detail');
	}

}