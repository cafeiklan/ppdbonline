<?php

/*
	Install library
	
	@package emkapluginkit
	@version 0.1.1
	@author Luthfi Emka <luthfi@emka.web.id>
	
*/
if( !class_exists('emkapluginkit_install') ):

Class emkapluginkit_install
{
	public function __construct()
	{
		global $wpdb;
		
		$this->db = $wpdb;
	}
	
	public function prepare_dbtable( $tablename, $sql)
    {
		$sql = str_replace('$tablemenu', $tablemenu, $sql );
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
	
}

endif;
?>
