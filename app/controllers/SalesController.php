<?php

class SalesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sales = Sales::paginate(5);
		return View::make('trading.sales.index')->with('sales',$sales);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('trading.sales.create')->with('page','Sales')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nama_sales' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('sales/create')->withErrors($validator)->withInput();
		}else{
			$sales = new Sales();
			$sales->nama_sales = Input::get('nama_sales');
			$sales->save();
			
			Session::flash('message','Successfully created a Sales');
			return Redirect::to('sales')->with('page','Sales')->with('modul','Index');
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
		$sales = Sales::find($id);
		return View::make('trading.sales.show')->with('sales',$sales)
		->with('page','Sales')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sales = Sales::find($id);
		return View::make('trading.sales.edit')->with('sales',$sales)
		->with('page','Sales')->with('modul','Show');
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
			'nama_sales' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('sales/edit')->withErrors($validator)->withInput();
		}else{
			$sales = Sales::find($id);
			$sales->nama_sales = Input::get('nama_sales');
			$sales->save();
			
			Session::flash('message','Successfully updated a Sales');
			return Redirect::to('sales')->with('page','Sales')->with('modul','Index');
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
		$sales = Sales::find($id);
		$sales->delete();
		
		Session::flash('message','Successfully deleted Sales');
		return Redirect::to('sales')->with('page','Sales')->with('modul','Index');
	}


}
