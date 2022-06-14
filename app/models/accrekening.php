<?php

class Accrekening Extends Eloquent{
	protected $table = "acc_rekenings";
	protected $primaryKey = "id_rekening";

	public function accjournaldetail(){
		return $this->hasMany('Accjournaldetail','id_rekening');
	}
}