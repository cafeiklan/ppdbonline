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
class branding extends emkapluginkit_branding {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->version = '0.1.1';
		$footer = array(
				'footer_text'	=> '&copy; '.date("Y").' SMA 1 Contoh. All right reserved.'
			       );
		
		$this->rebrand('footer', $footer);
		$this->rebrand('widgets');
		
	}
}


?>
