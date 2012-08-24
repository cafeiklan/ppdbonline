<?php

if( !class_exists('emkapluginkit_model') ):


Class emkapluginkit_model
{
	public function __construct()
	{
		global $wpdb;
		
		$this->db = $wpdb;
	}
	
}


endif;
?>
