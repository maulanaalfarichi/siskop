<?php

class Adjustmentcontroller extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Adjustment::paginate(5);
		return View::make('trading.adjustment.index')->with('data',$data)
		->with('page','adjustment')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('trading.adjustment.create')->with('page','Adjustment')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id_barang' =>'required',
			'jml_adjust' =>'required|numeric',
			'jenis_adjust' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('adjustment/create')->withErrors($validator)->withInput();
		}else{
			$data = new Adjustment();
			$data->tanggal_adjust = date('Y-m-d');
			$data->id_barang = Input::get('id_barang');
			$data->jenis_adjust = Input::get('jenis_adjust');
			$data->jml_adjust = Input::get('jml_adjust');
			$data->keterangan = Input::get('keterangan');
			$data->save();
			
			$this->hitung_stok(Input::get('id_barang'),Input::get('jenis_adjust'),Input::get('jml_adjust'));
			
			Session::flash('message','Successfully created a Adjustment');
			return Redirect::to('adjustment')->with('page','Adjustment')->with('modul','Index');
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
		$data = Adjustment::find($id);
		return View::make('trading.adjustment.show')->with('data',$data)
		->with('page','Adjustment')->with('modul','Show');
	}


	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data = Adjustment::find($id);
		$barang = Barang::find($data->id_barang);
		if($data->jenis_adjust == "-")
		{
			$barang->stok = $barang->stok + $data->jml_adjust;
			$barang->save();
		}else{
			$barang->stok = $barang->stok - $data->jml_adjust;
			$barang->save();
		}
		
		$data->delete();
		
		Session::flash('message','Successfully deleted Adjustment');
		return Redirect::to('adjustment')->with('page','Adjustment')->with('modul','Index');
	}
	
	public function hitung_stok($id,$jenis,$jml)
	{
		$data = Barang::find($id);
		if($jenis == "-"){
			$data->stok = $data->stok - $jml;
		}else{
			$data->stok = $data->stok + $jml;
		}
		$data->save();
		
	}


}
