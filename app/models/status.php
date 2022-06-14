<?php

class Status Extends Eloquent{
	protected $table = "status";
	protected $primaryKey = "id_status";
	
	public function peserta(){
		return $this->hasMany('Peserta','id_status');
	}
	
	public function claim(){
		return $this->hasMany('Claim','id_status');
	}
}