<?php

class Claim Extends Eloquent{
	protected $table = "claims";
	protected $primaryKey = "id_claim";
	
	public function peserta(){
		return $this->belongsTo('Peserta','id_peserta');
	}
	
	public function status(){
		return $this->belongsTo('Status','id_status');
	}
	
	public function bank(){
		return $this->belongsTo('Bank','id_bank');
	}
}