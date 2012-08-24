<?php

class ppdbonline_pendaftaran extends emkapluginkit
{
	public function ppdbonline_pendaftaran()
	{
		$this->helper('security,formvalidation');
	}
	
	public function form_pendaftaran()
	{
		if(empty( $_POST )){
			$this->view('form/pendaftaran_baru');
		}else{
			$data = filter_submittedform( $_POST );
			
			
			$formval = new emka_formvalidation($data);
			//$formval->inspect( 'nama lengkap', $data['str_namalengkap'], array('not_empty') );
			echo '<pre>';
			$formval->automa($data, 'not_empty&min_length=5');
		
			$err = $formval->get_results(); 
			
			//print_r($_POST);
			print_r($err);
			echo '</pre>';
			/*
			 * Array
					(
						[str_namalengkap] => 
						[str_namakotalahir] => 
						[tgl_lahir] => 
						[bln_lahir] => 
						[thn_lahir] => 
						[nama_sekolahasalnonrayon] => 
						[jenis_sekolah] => 
						[str_namakecamatansekolah] => 
						[str_namakabkotasekolah] => 
						[str_namaprovinsisekolah] => 
						[str_alamatlengkap] => 
						[num_rt] => 
						[num_rw] => 
						[str_namadesa] => 
						[str_namakecamatan] => 
						[str_namaayah] => 
						[str_namaibu] => 
						[phone_rumah] => 
						[phone_siswa] => 
						[bhs_1] => 
						[bhs_2] => 
						[bhs_3] => 
						[bhs_4] => 
						[bhs_5] => 
						[bhs_total] => 
						[bhs_average] => 
						[eng_1] => 
						[eng_2] => 
						[eng_3] => 
						[eng_4] => 
						[eng_5] => 
						[eng_total] => 
						[eng_average] => 
						[mtk_1] => 
						[mtk_2] => 
						[mtk_3] => 
						[mtk_4] => 
						[mtk_5] => 
						[mtk_total] => 
						[mtk_average] => 
						[ipa_1] => 
						[ipa_2] => 
						[ipa_3] => 
						[ipa_4] => 
						[ipa_5] => 
						[ipa_total] => 
						[ipa_average] => 
						[ips_1] => 
						[ips_2] => 
						[ips_3] => 
						[ips_4] => 
						[ips_5] => 
						[ips_total] => 
						[ips_average] => 
					)*/
		}

	}
}
?>
