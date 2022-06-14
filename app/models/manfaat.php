<?php

class Manfaat Extends Eloquent{
	
	protected $fillable = array('id','id_paket');

	public function paket(){
		return $this->belongsTo('Paket','id_paket');
	}
}