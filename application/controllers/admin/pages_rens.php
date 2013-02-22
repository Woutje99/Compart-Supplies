<?php

class Admin_Pages_Controller extends Admin_Base_Controller {


	public function get_index()
	{
		$pages = static::buildMenu(Page::getPageTree());

		$this->layout->title			 = 'Pages';
		$this->layout->content->title	 = 'Pages';
		$this->layout->content->content	 = View::make('admin.pages_overview')
			->with('pages', $pages);
	}


	public function post_edit($id = 0, $parent = null)
	{
		$page = Page::find($id);

		if ( is_null($page) )
		{
			$page				 = new Page;
			$page->is_active	 = 1;
			$page->in_menu		 = 1;
		}

		if ( $_POST )
		{
			$page->title = Input::get('title');
			if ( is_null($page->parent_id) )
			{
				$page->parent_id		 = (!empty($parent)) ? intval($parent) : null;
			}
			$page->menu_name		 = Input::get('menu_name');
			$page->identifier		 = Input::get('identifier');
			$page->content			 = Input::get('content');
			$page->meta_title		 = Input::get('meta_title');
			$page->is_active		 = Input::has('is_active') ? 1 : 0;
			$page->in_menu			 = Input::has('in_menu') ? 1 : 0;
			$page->save();

			// Update all pages pathto's
			Page::generatePathto();

			Notices::add('success', 'Pagina `' . $page->menu_name . '` opgeslagen.');
			return Redirect::to('admin/pages');
		}

	}

	public function get_edit($id = 0)
	{
		$page = Page::find($id);

		if ( is_null($page) )
		{
			$page				 = new Page;
			$page->is_active	 = 1;
			$page->in_menu		 = 1;
		}

		$this->layout->title			 = 'Bewerken:' . $page->title;
		$this->layout->content->title	 = 'Bewerken:' . $page->title;
		$this->layout->content->content	 = View::make('admin.pages_edit')
			->with('page', $page);
	}


	public function get_delete($id)
	{
		$page = Page::find($id);

		if ( !is_null($page) AND $page->pathto != 'home' )
		{
			$page->delete();
			Notices::add('success', 'Pagina `' . $page->menu_name . '` verwijderd.');
			return Redirect::to('admin/pages');
		}
		Notices::add('error', 'De pagina kan niet worden gevonden.');
		return Redirect::to('admin/pages');
	}


	public function post_changeorder()
	{
		$list = Input::get('list');

		if ( $list )
		{
			static::change_order($list);
			Page::generatePathto();
			Notices::add('success', 'Volgorde aangepast op '.date('d F H:i:s').'.');
		}

		return 1;
	}


	private static function change_order($array, $parent_id = null)
	{
		foreach ($array as $order => $page)
		{
			$id			 = !empty($page['id']) ? $page['id'] : null;
			$children	 = !empty($page['children']) ? $page['children'] : null;

			$db_page = Page::find($id);

			if ( $db_page )
			{
				$db_page->order		 = $order + 1;
				$db_page->parent_id	 = $parent_id;
				$db_page->save();
				
				//Notices::add('info', 'Pagina `'.$db_page->menu_name.'` is aangepast.');
				
				if ( $children AND count($children) )
				{
					static::change_order($children, $db_page->id);
				}
			}
		}
	}


	private static function buildMenu($pages)
	{
		$ul = '<ol id="sortlist" class="sortable">';

		foreach ($pages as $page)
		{
			$ul .= '<li class="' . (($page->hasChilds()) ? 'submenu' : '') . ($page->identifier === 'home' ? ' no-nest' : '') . '" id="list_' . $page->id . '">';
			$ul .= '<div><span>' . $page->menu_name . '</span>';

			if ( $page->identifier !== 'home' )
			{
				$ul .= '<a href="admin/pages/edit/0/' . $page->id . '"><i class="icon-file"></i> Subpagina toevoegen</a>';
			}

			$ul .= '<a href="admin/pages/edit/' . $page->id . '"><i class="icon-pencil"></i> Bewerken</a>';

			if ( $page->identifier !== 'home' )
			{
				$ul .= '<a href="admin/pages/delete/' . $page->id . '"><i class="icon-remove"></i> Verwijderen</a>';
			}

			$ul .= '</div>';

			if ( $page->hasChilds() )
			{
				$ul .= static::buildMenu($page->getChilds());
			}

			$ul .= '</li>';
		}

		$ul .= '</ol>';
		return $ul;
	}


}