<?php

class Pdam Extends Eloquent{
	protected $table = "pdams";
	protected $primaryKey = "id_pdam";
	
	public function peserta(){
		return $this->hasMany('Peserta','id_pdam');
	}
	
	public function anggota(){
		return $this->hasMany('Anggota','id_pdam');
	}
}