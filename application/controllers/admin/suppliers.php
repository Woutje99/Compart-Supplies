<?php

class Admin_Suppliers_Controller extends Admin_Base_Controller
{

	public function get_index()
	{
		$this->layout->title					=	'Leveranciers overzicht';
		$this->layout->content->title			=	'Leveranciers overzicht';
		$this->layout->content->content			=	View::make('admin.suppliers_overview')
														->with('suppliers', Supplier::all());
	}

	public function post_products()
	{
		$file = Input::file('file');
		$file = $file['tmp_name'];

		if (file_exists($file))
		{
	    	include $file;

			$printers = new SimpleXMLElement($xmlstr);

			foreach ($printers->printer as $print)
			{
				DB::table('products')->insert(array(
					'id'		=>	$print->id,
					'merk'		=>	$print->merk,
					'details'	=>	$print->details,
					'model'		=>	$print->model,
					'prijs'		=>	$print->prijs
				));
			}

			Notices::add('success', 'Import van `' . $file . '` is gelukt.');
			return Redirect::to_action('admin.suppliers@products');
        }
        else
        {
        	Notices::add('error', 'Geen import file geselecteerd');
			return Redirect::to_action('admin.suppliers@products');
        }

	}

	public function get_products()
	{

		$this->layout->title					=	'Producten importeren';
		$this->layout->content->title			=	'Producten importeren';
		$this->layout->content->content			=	View::make('admin.suppliers_products')
														->with('supplierproducts', Product::all());
	}

//Can someone else help me with this import XML, after uploading the XML file and submit ,it gives me a 404 page and nothing is uploaded into the database  This is the controller: http://paste.laravel.com/iaG and this the form: http://paste.laravel.com/iaH


}





/*public function post_import()
	{
		$input = array(
			'csv' => Input::file('csv')
		);

		$rules = array(
			'csv' => 'required'
		);

		$v = Validator::make($input, $rules);

		if($v->fails())
		{
			return Redirect::back()
							->with_errors($v->errors);
		}
		else
		{
			ini_set("auto_detect_line_endings", true);

			$path = path('bundle').'mmail'.DS.'csv_tmp';

			// Verschieben der CSV
			Input::upload('csv', $path, 'test.csv');
			$data = fopen($path.DS.'test.csv', 'r');

			while(!feof($data))
			{
				$rows[] = fgetcsv($data, 0, ';', '"', '\\');
			}
			fclose($data);

			foreach($rows as $key => $row)
			{
				if($row[3] == 'Firma')
				{
					$dataa[$key]['firstname'] = '';
					$dataa[$key]['lastname'] = '';
					$dataa[$key]['company'] = $row[1];
					$dataa[$key]['email'] = $row[4];
					$dataa[$key]['title'] = '';
				}
				else
				{
					$dataa[$key]['firstname'] = $row[2];
					$dataa[$key]['lastname'] = $row[1];
					$dataa[$key]['company'] = '';
					$dataa[$key]['email'] = $row[4];
					$dataa[$key]['title'] = $row[3];
				}

			}
			// Head Elemente löschen
			array_shift($dataa);

			foreach($dataa as $data)
			{
				$clients = new Models\Client($data);
				$clients->save();
			}
}*/