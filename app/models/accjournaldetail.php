<?php

class Accjournaldetail Extends Eloquent{
	protected $table = "acc_journal_details";
	
	public function accrekening(){
		return $this->belongsTo('Accrekening','id_rekening');
	}
	
	public function accheader(){
		return $this->belongsTo('Accjournalheader','no_bukti');
	}
}