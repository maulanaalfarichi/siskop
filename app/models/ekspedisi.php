<?php 

Class Ekspedisi Extends Eloquent{
	protected $table = "trx_ekspedisis";
	
	public function Penjualan()
	{
		return $this->hasMany('Ekspedisi','id_ekspedisi');
	}
}