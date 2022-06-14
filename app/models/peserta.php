<?php

class Peserta Extends Eloquent{
	protected $table = "pesertas";
	protected $primaryKey = "id_peserta";
	
	public function pdam(){
		return $this->belongsTo('Pdam','id_pdam');
	}
	
	public function paket(){
		return $this->belongsTo('Paket','id_paket');
	}
	
	public function bank(){
		return $this->belongsTo('Bank','id_bank');
	}
	
	public function status(){
		return $this->belongsTo('Status','id_status');
	}
	
	public function iuran(){
		return $this->hasMany('Iuran','id_peserta');
	}
	
	public function claim(){
		return $this->hasMany('Claim','id_peserta');
	}
}