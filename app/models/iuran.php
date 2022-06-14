<?php

class Iuran Extends Eloquent{


	public function peserta(){
		return $this->belongsTo('Peserta','id_peserta');
	}
}