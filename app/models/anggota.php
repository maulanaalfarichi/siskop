<?php 

Class Anggota Extends Eloquent{
	protected $table = "usp_anggotas";
	
	public function simpanan()
	{
		return $this->hasMany('Simpanan','id_anggota');
	}
	
	public function pdam()
	{
		return $this->belongsTo('Pdam','id_pdam');
	}
}