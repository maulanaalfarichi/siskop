<?php

class Accjournalheader Extends Eloquent{
	protected $table = "acc_journal_headers";
	protected $primaryKey = "no_bukti";

	public function accrekening(){
		return $this->belongsTo('Accrekening','id_rekening');
	}
	
	public function accdetail(){
		return $this->hasMany('Accjournaldetail','no_bukti');
	}
}