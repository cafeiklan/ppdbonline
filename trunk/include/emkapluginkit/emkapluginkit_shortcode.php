<?php

/**
 * Main Library for Shortcode
 * 
 */

if( !class_exists('emkapluginkit_shortcode') ):

Class emkapluginkit_shortcode
{
	public function add( $code, $function_name, $page_name )
	{
		$this->path = dirname( plugin_dir_path(__FILE__) );
		$this->path = $this->path.'/page/';
		
		if( file_exists( $this->path.$page_name.'.php') ){
			include_once $this->path.$page_name.'.php';
			$this->page[$page_name] = new $page_name;
			
			add_shortcode( $code , array( &$this->page[$page_name], $function_name ) );
		}
	}
}

endif;
?>
