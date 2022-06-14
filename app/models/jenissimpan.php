<?php 

Class Jenissimpan Extends Eloquent{
	
	protected $table = "usp_jenis_simpan";
	
	public function simpanan()
	{
		return $this->hasMany('Simpanan','id_jenis');
	}
}