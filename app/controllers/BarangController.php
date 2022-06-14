<?php

class BarangController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Barang::paginate(5);
		return View::make('trading.barang.index')->with('data',$data)
		->with('page','Barang')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('trading.barang.create')->with('page','Barang')->with('modul','Create');
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
			'nama_barang' =>'required',
			'satuan' => 'required',
			'stok' =>'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('barang/create')->withErrors($validator)->withInput();
		}else{
			$data = new Barang();
			$data->id = Input::get('id');
			$data->nama_barang = Input::get('nama_barang');
			$data->satuan = Input::get('satuan');
			$data->stok = Input::get('stok');
			$data->save();
			
			Session::flash('message','Successfully created a Barang');
			return Redirect::to('barang')->with('page','Baramg')->with('modul','Index');
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
		$data = Barang::find($id);
		return View::make('trading.barang.show')->with('data',$data)
		->with('page','Barang')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Barang::find($id);
		return View::make('trading.barang.edit')->with('data',$data)
		->with('page','Barang')->with('modul','Show');
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
			'nama_barang' =>'required',
			'satuan' => 'required',
			'stok' =>'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('barang/'.$id.'/edit')->withErrors($validator)->withInput();
		}else{
			$data = Barang::find($id);
			$data->nama_barang = Input::get('nama_barang');
			$data->satuan = Input::get('satuan');
			$data->stok = Input::get('stok');
			$data->save();
			
			Session::flash('message','Successfully update a Barang');
			return Redirect::to('barang')->with('page','Baramg')->with('modul','Index');
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
		$data = Barang::find($id);
		$data->delete();
		
		Session::flash('message','Successfully deleted Barang');
		return Redirect::to('barang')->with('page','Barang')->with('modul','Index');
	}


}
