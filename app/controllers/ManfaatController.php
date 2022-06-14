<?php

class ManfaatController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Manfaat::all(array('id','id_paket','bulan','manfaat','santunan','tambahan')))
					->showColumns('id_paket','bulan','manfaat','santunan','tambahan')
					->addColumn('',function($model){
						return '<a href="manfaat/'.$model->id.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="manfaat/'.$model->id.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="manfaat/'.$model->id.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('id_paket','bulan','manfaat','santunan','tambahan')
					->orderColumns('id_paket','bulan','manfaat','santunan','tambahan')
					->make();
		}
		return View::make('pht.manfaat.index')->withTitle('Manfaat');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$paket = Paket::Lists('nama_paket','id_paket');
		return View::make('pht.manfaat.create')->with('page','Manfaat')->with('modul','Create')
		             ->with('paket',$paket);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id_paket' => 'required',
			'bulan' =>'required|numeric',
			'manfaat' => 'required|numeric',
			'santunan' => 'required|numeric',
			'tambahan' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('manfaat/create')->withErrors($validator)->withInput();
		}else{
			$manfaat = new Manfaat();
			$manfaat->id_paket = Input::get('id_paket');
			$manfaat->bulan = Input::get('bulan');
			$manfaat->manfaat = Input::get('manfaat');
			$manfaat->santunan = Input::get('santunan');
			$manfaat->tambahan = Input::get('tambahan');
			$manfaat->save();
			
			Session::flash('message','Successfully created a Manfaat');
			return Redirect::to('manfaat')->with('page','Manfaat')->with('modul','Index');
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
		$manfaat = Manfaat::find($id);
		return View::make('pht.manfaat.show')->with('manfaat',$manfaat)->with('page','Manfaat')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$manfaat = Manfaat::find($id);
		$paket = Paket::Lists('nama_paket','id_paket');
		return View::make('pht.manfaat.edit')->with('manfaat',$manfaat)->with('page','Manfaat')->with('modul','Edit')
		               ->with('paket',$paket);
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
			'id_paket' =>'required',
			'bulan' => 'required|numeric',
			'manfaat' => 'required|numeric',
			'santunan' => 'required|numeric',
			'tambahan' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('manfaat/'.$id.'/edit')->withErrors($validator);
		}else{
			$manfaat = Manfaat::find($id);
			$manfaat->id_paket = Input::get('id_paket');
			$manfaat->bulan = Input::get('bulan');
			$manfaat->manfaat = Input::get('manfaat');
			$manfaat->santunan = Input::get('santunan');
			$manfaat->tambahan = Input::get('tambahan');
			$manfaat->save();
			
			Session::flash('message','Successfully update a Manfaat');
			return Redirect::to('manfaat')->with('page','Manfaat')->with('modul','Index');;
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
		$manfaat = Manfaat::find($id);
		$manfaat->delete();
		
		Session::flash('message','Successfully deleted Manfaat');
		return Redirect::to('manfaat')->with('page','Manfaat')->with('modul','Index');
	}


}
