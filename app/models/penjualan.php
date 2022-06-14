<?php 

Class Penjualan Extends Eloquent
{
	protected $table = "trx_penjualan";
	
	public function pelanggan()
	{
		return $this->belongsTo('Pelanggan','id_pelanggan');
	}
	
	public function ekspedisi()
	{
		return $this->belongsTo('Ekspedisi','id_ekspedisi');
	}
}