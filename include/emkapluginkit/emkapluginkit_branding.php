<?php
/*
 * Branding Library
 *
 * Branding library for Dashboard Admin rebranding, A part of Emka Plugin Kit
 *
 * @subpackage Emka Plugin Kit
 * @version 0.1
 * @author Luthfi Emka <luthfi@emka.web.id>
 *
 */

if( !class_exists('emkapluginkit_branding') ):

class emkapluginkit_branding {
	
	private $brand;
	private $version;
	
	function __construct( $brand = array() )
	{
		
	}
	
	/*
	 * Do Rebranding
	 *
	 * Do rebranding action to WordPress admin dashboard based on it params.
	 *
	 * @author Luthfi Emka <luthfi@emka.web.id>
	 * @version 0.1
	 *
	 * @param string $action Branding target actions
	 * @param array $brand Branding parameters to passed by
	 *
	 */
	function rebrand( $actions, $brand = array() )
	{
		
		switch($actions){
			case 'footer':
				$this->brand->footer_text = $brand['footer_text'];
				add_filter('admin_footer_text', array( &$this, 'footer_text' ) );
			break;
		
			case 'widgets':
				add_action('wp_dashboard_setup', array( &$this, 'widgets') );
			break;
		
			case 'adminbar':
				add_action( 'wp_before_admin_bar_render', array( &$this, 'adminbar_logo') );
			break;
		}
		
	}

	/*
	 * Dashboard Footer Branding
	 * 
	 * Re branding the default wordpress footer dashboard with custom values
	 * 
	 * @author Luthfi Emka <luthfi@emka.web.id>
	 * @since 0.1
	 */
		
	function footer_text() 
	{	
		echo $this->brand->footer_text;
	}
	
	
	
	/*
	 * Dashboard Widgets Branding
	 *
	 * Re branding the default dashboard widgets
	 *
	 * @author Luthfi Emka <luthfi@emka.web.id>
	 * @version 0.1
	 *
	 */
	function widgets( $widget_name )
	{
		global $wp_meta_boxes;
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);		
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
		unset($wp_meta_boxes['dashboard']['normal']['sorted']['dashboard_primary']);
		
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
		
		unset($wp_meta_boxes['dashboard']['side']['sorted']['dashboard_primary']);
	}
	
	/*
	 * Admin Bar Logo Branding
	 *
	 * Re branding the default admin bar (work only on single blog, not WPMU)
	 * @author Luthfi Emka <luthfi@emka.web.id>
	 */
	function adminbar_logo() 
	{
		global $wp_admin_bar;
		
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('my-blogs');
	}
}

endif;
?>
