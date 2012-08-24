<?php
if( !class_exists( 'emkapluginkit_menu' ) ):
	
class emkapluginkit_menu
{
    private $path;
    private $page;
    private $db;
    private $url;
    
    function __construct()
    {
      global $wpdb;
      $this->db = $wpdb;
		$this->url = plugin_dir_url(dirname(__FILE__)).'images/';
		$this->url = str_replace('include/','', $this->url);
	
      add_action( 'admin_menu', array( &$this, 'install_menu' ) );
      $this->path->absolute	= dirname(plugin_dir_path(__FILE__));
		$this->path->page	= $this->path->absolute.'/page/';
    }
    
    function install_menu()
    {
    
    /*
	 * Build Page Menu
	 *
	 */
        $table_menu = $this->db->prefix."adminmenu";
	
	$pagemenu = $this->db->get_results("SELECT * FROM $table_menu
					   WHERE level = '0' ORDER BY text ASC");
	
	foreach($pagemenu as $menu){
	    
	    if( file_exists( $this->path->page.$menu->slug.'.php' ) ){
		require_once $this->path->page.$menu->slug.'.php';
		$this->page[$menu->slug] = new $menu->slug;
	    }else{
		continue;
	    }
	    
	    add_menu_page(
		     $menu->desc,
		     $menu->text,
		     $menu->capability,
		     $menu->url,
		     array($this->page[$menu->slug], $menu->function),
		     $this->url.$menu->icon.'-16.png',
		     $this->position
		     );
	}
	
	/*
	 * Build Sub Menu
	 *
	 */
	$submenu = $this->db->get_results("SELECT * FROM $table_menu
					  WHERE level='1' ORDER BY position ASC");
	
	foreach($submenu as $menu){
	    add_submenu_page( 
		$menu->parent, 
		$menu->desc,
		$menu->text,
		$menu->capability,
		$menu->slug, 
		array( $this->page[$menu->parent], $menu->function) );
	}
	
    }
}

endif;


?>
