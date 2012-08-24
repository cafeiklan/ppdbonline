<?php
/**
 * WP Screen Helper
 * 
 * WordPress Dashboard screen helper
 * 
 * @subpackage Emka Plugin Kit
 * @version 0.1
 * @author Luthfi Emka <luthfi@emka.web.id>
 * 
 */
 
if( !function_exists('wpscreen_begin') ):
	
	function wpscreen_begin()
	{
		echo '<div class="wrap">';
	}
	
endif;

if( !function_exists('wpscreen_title') ):
	
	function wpscreen_title( $title, $icon = null )
    {
		$url = plugin_dir_url(dirname(__FILE__)).'images/';
		$url = str_replace('include/','', $url);
		
        if($icon != null){
            echo '<div class="icon32"><img src="'.$url.$icon.'.png" /></div><h2>'.$title.'</h2>';
        }else{
            echo '<h2>'.$title.'</h2>';
        }
    }
	
endif;

if( !function_exists('wpscreen_desc') ):

	function wpscreen_desc( $description )
    {
        echo '<p class="description">'.$description.'</p>';
    }
    
endif;

if( !function_exists('wpscreen_finalize') ):

	function wpscreen_finalize()
    {
        echo '</div>';
    }
    
endif;

?>
