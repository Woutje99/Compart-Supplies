<?php

class Notices
{
	private static $messages = array();
	
	
	public static function add($type, $message)
	{
		static::$messages[] = array('type'=>$type, 'message'=>$message);
		static::update();
	}
	
	public static function get()
	{
		return static::$messages;
	}
	
	public static function render()
	{
		static::update();
		
		$return_html = '';
		foreach(static::$messages as $message)
		{
			$return_html .= '<div class="alert alert-'.e($message['type']).' alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button>
							'.$message['message'].'
							</div>';
		}
		
		static::clear();
		return $return_html;
	}
	
	private static function update()
	{
		$messages = Session::get('messages', array());
		static::$messages = static::$messages + $messages;
		Session::put('messages', static::$messages);
		
	}
	
	private static function clear()
	{
		Session::forget('messages');
	}
}