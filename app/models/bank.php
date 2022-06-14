<?php

class Bank Extends Eloquent{
	protected $table = "banks";
	protected $primaryKey = "id_bank";
	
	public function peserta(){
		return $this->hasMany('Peserta','id_bank');
	}
	
	public function claim(){
		return $this->hasMany('Claim','id_status');
	}
}