<?php

Class model_datarekap extends emkapluginkit_model
{
	public function __construct()
	{
		parent::__construct();
		$this->table->mohon_sistem = $this->db->prefix.'request_sistem';
		$this->table->mohon_hosting = $this->db->prefix.'request_hosting';
	}
	
	
	public function get_datarekapmohon_sistem()
	{
		$data = $this->db->get_results("SELECT * FROM $this->table->mohon_sistem ORDER BY id ASC");
		return $data;
	}
	
	public function get_datarekapmohon_hosting()
	{
		$data = $this->db->get_results("SELECT * FROM $this->table->mohon_hosting ORDER BY id ASC");
		return $data;	
	}
	
}
?>
