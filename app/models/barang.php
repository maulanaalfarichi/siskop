<?php 

Class Barang Extends Eloquent{
	protected $table = "trx_barang";
	
	public function adjustment()
	{
		return $this->hasMany('Adjustment','id_barang');
	}
}