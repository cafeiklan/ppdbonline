<?php

Class shortcode extends emkapluginkit_shortcode {
	
	public function __construct()
	{
		$this->add( 'form_cetak_bukti_pendaftaran', 'cetak_buktidaftar', 'ppdbonline_pendaftaran' );
		$this->add( 'form_pendaftaran_siswa', 'form_pendaftaran', 'ppdbonline_pendaftaran' );
		$this->add( 'jurnal_pendaftaran_total', 'jurnal_pendaftaranumum', 'ppdbonline_pendaftaran' );
		$this->add( 'jurnal_pendaftaran_harian', 'jurnal_pendaftaranharian', 'ppdbonline_pendaftaran' );
	}
	
}



?>
