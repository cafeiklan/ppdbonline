<?php
/*
	emkapluginkit
	
	Foolish WordPress Plugin Framework with taste of Object-oriented MVC feature.
	
	@author Luthfi Emka <luthfi@emka.web.id>
	@version 0.1.1
	@package emkapluginkit
	@copyright (c) 2012 Luthfi Emka & its licensors.
	@license Apache License
	
	NOTICE:
	This is very early development versions, do not use as production framework.
	
*/
if( !class_exists('emkapluginkit') ):

define( 'EMKAPLUGINKIT_PATH', plugin_dir_path(__FILE__) );
define( 'PPDBONLINE_NAMA_SEKOLAH', 'SMA 1 Muria' );

Class emkapluginkit
{
	private $_loaded_classes = array();
	private $path;
	
	/*
	 * Fungsi Load Library
	 * 
	 * Fungsi untuk meload library
	 * 
	 */
	public function load( $classes, $args = null )
	{
		/*
		 * definisi path dan url
		 *
		 */
		$this->path->library	= $this->path->absolute.'';
		
		$cl = explode(',', $classes);
		if(is_array($cl)) {
			foreach($cl as $classname) {
				$classname = trim($classname);
				//* Class is not loaded so load it
				if(!array_key_exists($classname, $this->_loaded_classes) && file_exists( EMKAPLUGINKIT_PATH."library/lib-$classname.php")) {
					require_once( EMKAPLUGINKIT_PATH."library/lib-$classname.php");
					$this->$classname = new $classname( $args );
					$this->_loaded_classes[$classname] = true;
				}
			}
		}
	}
	
	/*
	 * Fungsi load View
	 * 
	 * Fungsi untuk meload halaman view
	 * 
	 */
	
	public function view( $views, $data = null )
	{
		/*
		 * definisi path dan url
		 *
		 */
		$this->path->view		= EMKAPLUGINKIT_PATH.'view/';
		$view_file	= explode(',', $views );
		
		if( is_array($view_file) )
		{
			foreach($view_file as $file){
				if( file_exists( $this->path->view.$file.'.php') )
				{
					if(!empty($data)){
						extract( $data, EXTR_SKIP );
					}
					require_once $this->path->view.$file.'.php';
				}
			}
		}
	}
	
	public function helper( $helpers )
	{
		/*
		 * definisi path dan url
		 *
		 */
		$this->path->helper		= EMKAPLUGINKIT_PATH.'helper/';
		
		$helper_file	= explode(',', $helpers );
		
		if( is_array($helper_file) )
		{
			foreach($helper_file as $file){
				
				if( file_exists( $this->path->helper.'helper-'.$file.'.php') )
				{
					include_once $this->path->helper.'helper-'.$file.'.php';
				}
			}
		}
	}
	
	public function model( $models )
	{
		/*
		 * definisi path dan url
		 *
		 */
		$this->path->model		= EMKAPLUGINKIT_PATH.'model/';
		
		$model_file	= explode(',', $models );
		
		if( is_array($model_file) )
		{
			foreach($model_file as $file){
				
				if( file_exists( $this->path->model.$file.'.php') )
				{
					include_once $this->path->model.$file.'.php';
					$this->$file = new $file();
				}
			}
		}
	}
	
}

include_once 'emkapluginkit/emkapluginkit_install.php';
include_once 'emkapluginkit/emkapluginkit_menu.php';
include_once 'emkapluginkit/emkapluginkit_shortcode.php';
include_once 'emkapluginkit/emkapluginkit_rolecap.php';
include_once 'emkapluginkit/emkapluginkit_branding.php';

endif;
?>
