<?php
/*
Plugin Name: Penerimaan Peserta Didik Baru Online
Plugin URI: http://code.emka.web.id/index.php/wp-ppdbonline/
Description: Sistem informasi Penerimaan Peserta Didik Baru (PPDB) berbasis WordPress. (c) 2012 Luthfi Emka. Info Pembelian & Upgrade di <a href="http://shop.emka.web.id/">http://shop.emka.web.id/</a>. Technical Support (e-Mail only): ppdbonline@emka.web.id
Version: 1.0
Author: Luthfi Maslichul Kurniawan
Author URI: http://luthfi.emka.web.id/
/* ----------------------------------------------*/

/*
 * Load framework
 * 
 */
include_once 'include/emkapluginkit.php';

Class PPDBOnline extends emkapluginkit
{
	/*
	 * Constructor
	 * 
	 */
	public function __construct()
	{
		/*
		 * Load modul Instalasi / Uninstalasi Plugin
		 *
		 */
		$this->load('install');
		
		/*
		 * Register fungsi aktivasi/deaktivasi
		 *
		 */
		register_activation_hook( __FILE__, array(  &$this->install, 'activate' ) );
		register_deactivation_hook( __FILE__, array(  &$this->install, 'deactivate' ) );
		
		
		//lakukan rebranding dashboard admin
		$this->load('branding');
		
		//lakukan instalasi menu
		$this->load('menu');
		
		$this->load('shortcode');
	}
	
}

$ppdbonline = new PPDBOnline();

?>
