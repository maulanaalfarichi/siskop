<?php 

Class Simpanan Extends Eloquent{
	protected $table = "usp_simpanans";
	
	public function anggota()
	{
		return $this->belongsTo('Anggota','id_anggota');
	}
	
	public function jenissimpan()
	{
		return $this->belongsTo('Jenissimpan','id_jenis');
	}
}