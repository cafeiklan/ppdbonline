<?php


class install extends emkapluginkit_install
{
	public function __construct()
	{
		parent::__construct();
	}
	
    public function activate()
    {
	/*
	 * jika versi wp kurang dari WP 3.2, instalasi gagal
	 *
	 */
	if( version_compare( get_bloginfo( 'version' ), '3.2', '<' ) ):
	    deactivate_plugins( basename( __FILE__ ) ); //deaktifasi plugin
	endif;
        
        $this->save_options();
        
        
        //$rolecap = new emkapluginkit_rolecap();
		//$rolecap->add_role( 'Operator', 'Operator PPDB');
		//$rolecap->add_cap('Operator', array('manage_datappdb' ) );
		
		// prepare table menu
		//$tablemenu = $this->db->prefix.'adminmenu';
		
		//$sql = '';
		
		//$this->prepare_dbtable( $tablemenu, base64_decode($sql) );
    }

    public function deactivate()
    {
    	$this->delete_options();
    	$rolecap = new emkapluginkit_rolecap();
		$rolecap->remove_cap('Operator', array('manage_datappdb') );
		$rolecap->remove_cap('administrator', array('manage_datappdb') );
		$rolecap->remove_role('Operator');
    	
    }

    public function save_options()
    {
        $plugin_options = array(
                                'ppdbonline_db_version'          => '12',
                                'ppdbonline_installation_date'   => date("Y-m-d H:i:s"),
                                'ppdbonline_siteurl'             => site_url()
                                );
        
        update_option( 'ppdbonline_plugin', $plugin_options );
    }
    
    public function delete_options()
    {
        delete_option('ppdbonline_plugin');
    }
    
    
}
?>
