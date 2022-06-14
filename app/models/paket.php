<?php

class Paket Extends Eloquent{
	protected $table = "pakets";
	protected $primaryKey = "id_paket";
	
	public function manfaat(){
		return $this->hasOne('Manfaat','id_paket');
	}
	
	public function peserta(){
		return $this->hasOne('Peserta','id_paket');
	}
}