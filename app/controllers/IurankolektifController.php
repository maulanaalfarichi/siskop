<?php

class IurankolektifController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pdam = Pdam::Lists('nama_pdam','id_pdam');
		return View::make('pht.iurankolektif.index')->with('pdam',$pdam)
		                ->with('page','Pembayaran Iuran')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$pdam = Pdam::find(Input::get('id_pdam'));
		$peserta_id = $pdam->peserta->lists('id_peserta','id_peserta');
		$iuran = Iuran::where('bln_thn','=',Input::get('bln_thn'))
		         ->whereIn('id_peserta',$peserta_id)->get();
		return View::make('pht.iurankolektif.edit')->with('iuran',$iuran)
					->with('id_pdam',Input::get('id_pdam'))->with('no',1);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$iuran = Iuran::find($id);
		$iuran->status = 'LUNAS';
		$iuran->tanggal_bayar = date('Y-m-d H:m:s');
		$iuran->save();

		$pdam = Pdam::find($iuran->peserta->id_pdam);
		$peserta_id = $pdam->peserta->lists('id_peserta','id_peserta');
		$iuran = Iuran::where('bln_thn','=',$iuran->bln_thn)
		         ->whereIn('id_peserta',$peserta_id)->get();
		//$iuran = Iuran::where('bln_thn',$iuran->bln_thn)->get();
		return View::make('pht.iurankolektif.edit')->with('iuran',$iuran)
					->with('id_pdam',$iuran->first()->peserta->pdam->id_pdam);
	}


}
