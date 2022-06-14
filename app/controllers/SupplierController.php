<?php

class SupplierController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$supplier = Supplier::paginate(5);
		return View::make('trading.supplier.index')->with('supplier',$supplier);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('trading.supplier.create')->with('page','Supplier')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nama_supplier' => 'required',
			'kota' =>'required',
			'contact' =>'required',
			'telp' =>'required',
			'product' =>'required',
			'email' =>'required',
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('supplier/create')->withErrors($validator)->withInput();
		}else{
			$supplier = new Supplier();
			$supplier->nama_supplier = Input::get('nama_supplier');
			$supplier->kota = Input::get('kota');
			$supplier->contact = Input::get('contact');
			$supplier->telp = Input::get('telp');
			$supplier->product = Input::get('product');
			$supplier->email = Input::get('email');
			$supplier->save();
			
			Session::flash('message','Successfully created a Supplier');
			return Redirect::to('supplier')->with('page','Supplier')->with('modul','Index');
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
		$supplier = Supplier::find($id);
		return View::make('trading.supplier.show')->with('supplier',$supplier)->with('page','Supplier')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$supplier = Supplier::find($id);
		return View::make('trading.supplier.edit')->with('supplier',$supplier)->with('page','Supplier')->with('modul','Show');
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
			'nama_supplier' => 'required',
			'kota' =>'required',
			'contact' =>'required',
			'telp' =>'required',
			'product' =>'required',
			'email' =>'required',
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('supplier/edit')->withErrors($validator)->withInput();
		}else{
			$supplier = Supplier::find($id);
			$supplier->nama_supplier = Input::get('nama_supplier');
			$supplier->kota = Input::get('kota');
			$supplier->contact = Input::get('contact');
			$supplier->telp = Input::get('telp');
			$supplier->product = Input::get('product');
			$supplier->email = Input::get('email');
			$supplier->save();
			
			Session::flash('message','Successfully updated a Supplier');
			return Redirect::to('supplier')->with('page','Supplier')->with('modul','Index');
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
		$supplier = Supplier::find($id);
		$supplier->delete();
		
		Session::flash('message','Successfully deleted Supplier');
		return Redirect::to('supplier')->with('page','Supplier')->with('modul','Index');
	}


}
