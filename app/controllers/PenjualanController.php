<?php

class PenjualanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Penjualan::paginate(5);
		return View::make('trading.penjualan.index')->with('data',$data)
		->with('page','Penjualan')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$pelanggan = Pelanggan::lists('nama_pelanggan','id');
		$ekspedisi = Ekspedisi::lists('nama','id');
		return View::make('trading.penjualan.create')
			->with('pelanggan',$pelanggan)->with('ekspedisi',$ekspedisi)
			->with('page','Penjualan')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id' => 'required',
			'id_pelanggan' =>'required',
			'id_ekspedisi' => 'required',
			'jumlah' => 'required|numeric',
			'diskon' => 'required|numeric',
			'ongkos_kirim' => 'required|numeric',
			'ppn' => 'required|numeric',
			'total' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('penjualan/create')->withErrors($validator)->withInput();
		}else{
			$data = new Penjualan();
			$data->id = Input::get('id');
			$data->tanggal_penjualan = date('Y-m-d');
			$data->id_pelanggan = Input::get('id_pelanggan');
			$data->id_ekspedisi = Input::get('id_ekspedisi');
			$data->jumlah = Input::get('jumlah');
			$data->diskon = Input::get('diskon');
			$data->ongkos_kirim = Input::get('ongkos_kirim');
			$data->ppn = Input::get('ppn');
			$data->total = Input::get('total');
			$data->save();
			
			Session::flash('message','Successfully created a Penjualan');
			return Redirect::to('penjualan')->with('page','Penjualan')->with('modul','Index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$penjualan = Penjualan::find($id);
		$data = Penjualandetail::where('id_penjualan','=',$id)->get();
		return View::make('trading.penjualandetail.index')->with('penjualan',$penjualan)
			->with('data',$data)->with('page','Penjualan')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pelanggan = Pelanggan::lists('nama_pelanggan','id');
		$ekspedisi = Ekspedisi::lists('nama','id');
		$data = Penjualan::find($id);
		return View::make('trading.penjualan.edit')->with('data',$data)
			->with('pelanggan',$pelanggan)->with('ekspedisi',$ekspedisi)
			->with('page','Penjualan')->with('modul','Show');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'id' => 'required',
			'id_pelanggan' =>'required',
			'id_ekspedisi' => 'required',
			'jumlah' => 'required|numeric',
			'diskon' => 'required|numeric',
			'ongkos_kirim' => 'required|numeric',
			'ppn' => 'required|numeric',
			'total' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('penjualan/'.$id.'/edit')->withErrors($validator)->withInput();
		}else{
			$data = Penjualan::find($id);
			$data->id = Input::get('id');
			$data->id_pelanggan = Input::get('id_pelanggan');
			$data->id_ekspedisi = Input::get('id_ekspedisi');
			$data->jumlah = Input::get('jumlah');
			$data->diskon = Input::get('diskon');
			$data->ongkos_kirim = Input::get('ongkos_kirim');
			$data->ppn = Input::get('ppn');
			$data->total = Input::get('total');
			$data->save();
			
			Session::flash('message','Successfully update a Penjualan');
			return Redirect::to('penjualan')->with('page','Penjualan')->with('modul','Index');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data = Penjualan::find($id);
		$data->delete();
		
		Session::flash('message','Successfully deleted Penjualan');
		return Redirect::to('penjualan')->with('page','Penjualan')->with('modul','Index');
	}

}
