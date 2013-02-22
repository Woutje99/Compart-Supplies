<?php

/**
 * Page Model
 * Table: pages
 */
class Page extends Eloquent {

	protected $_childs = array();


	public function childs()
	{
		return $this->has_many('Page', 'parent_id');
	}


	public function addChild(Page $page)
	{
		$this->_childs[] = $page;
	}


	public function getChilds()
	{
		return $this->_childs;
	}


	public function hasChilds()
	{
		return (bool) (count($this->_childs) > 0);
	}


	public function getDepth()
	{
		return (int) count(explode('/', $this->pathto));
	}


	public static function getPageTree($pages = null)
	{
		// Get all pages and put them in an array based on the depth of page in the menu.
		$pages			 = ($pages) ? $pages : Page::order_by('order', 'asc')->get();
		$pages_by_depth	 = array();

		foreach ($pages as $item)
		{
			$pages_by_depth[$item->getDepth()][$item->id] = $item;
		}
		unset($pages);
		// Reverse the depth array so we loop through the deepest pages first.
		krsort($pages_by_depth);

		foreach ($pages_by_depth as $depth => $pages)
		{
			if ( $depth > 1 )
			{
				foreach ($pages as $page)
				{
					if ( !is_null($page->parent_id) AND isset($pages_by_depth[$depth - 1][$page->parent_id]) )
					{
						$pages_by_depth[$depth - 1][$page->parent_id]->addChild($page);
					}
					else
					{
						die(var_dump($page));
					}
				}
			}
		}

		if ( !isset($pages_by_depth[1]) OR count($pages_by_depth[1]) <= 0 )
		{
			return null;
		}

		// Get first depth;
		return $pages_by_depth[1];
	}


	public static function generatePathto($first_load = true, $pathto = '', $pages = array())
	{
		if ( $first_load )
		{
			$pages = Page::where_null('parent_id')->get();
		}

		foreach ($pages as $page)
		{
			$page->pathto = $pathto . $page->identifier;
			$page->save();

			$childs = $page->childs()->get();
			if ( count($childs) > 0 )
			{
				static::generatePathto(false, $page->pathto . '/', $childs);
			}
		}
	}

	
	public function delete()
	{
		// Delete this page childs
		$childs = $this->childs()->get();
		if(count($childs))
		{
			foreach($childs as $child)
			{
				$child->delete();
			}
		}
		
		// Delete this page
		return parent::delete();
	}

}