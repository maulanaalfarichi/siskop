<?php 

Class Adjustment Extends Eloquent{
	protected $table = "trx_adjustment";
	
	public function barang()
	{
		return $this->belongsTo('Barang','id_barang');
	}
}