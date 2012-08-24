<?php

if( !class_exists('emkapluginkit_rolecap') ):

Class emkapluginkit_rolecap
{
	public function __construct()
	{
		global $wpdb;
		$this->db = $wpdb;
	}
	
	function add_role( $role, $role_desc )
	{
		$obj =& get_role( $role );
		if( is_null( $obj ) ){
			//default capabilities is: read
			add_role( $role, $role_desc, array( 'read'=> TRUE ) );
		}else{
			exit;
		}
	}
	
	function add_cap( $role, $capabilities = array(), $to_admin = false )
	{
		$obj =& get_role( $role );
		$objadm =& get_role( 'Administrator' );
		
		if( is_array($capabilities) ){
			foreach($capabilities as $cap){

				$obj->add_cap( $cap );
				
				// add to admin
				if( $to_admin ){
					$objadm->add_cap( $cap );
				}

			}
		}
	}
	
	function remove_cap( $role, $capabilities = array() )
	{
		$obj =& get_role( $role );
		$objadm =& get_role( 'Administrator' );
		
		if( is_array($capabilities) ){
			foreach($capabilities as $cap){
				if( is_numeric($cap) ){
					continue;
				}
				$obj->remove_cap( $cap );
				
				// add to admin
				//@$objadm->remove_cap( $cap );
			}
		}
	}
	
	function remove_role( $role){
		remove_role( $role );
	}
}

endif;
?>
