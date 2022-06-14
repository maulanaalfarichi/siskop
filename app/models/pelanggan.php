<?php 

Class Pelanggan Extends Eloquent{
	protected $table = "trx_pelanggan";
	
	public function penjualan()
	{
		return $this->hasMany('Penjualan','id_pelanggan');
	}
}