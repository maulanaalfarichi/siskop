<?php

class PaketController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Paket::all(array('id_paket','nama_paket','iuran','premi','operasional','cadangan')))
					->showColumns('id_paket','nama_paket','iuran','premi','operasional','cadangan')
					->addColumn('',function($model){
						return '<a href="paket/'.$model->id_paket.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="paket/'.$model->id_paket.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="paket/'.$model->id_paket.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('id_paket','nama_paket','iuran','premi','operasional','cadangan')
					->orderColumns('id_paket','nama_paket','iuran','premi','operasional','cadangan')
					->make();
		}
		return View::make('pht.paket.index')->withTitle('Paket');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pht.paket.create')->with('page','Paket')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id_paket' => 'required|max:5',
			'nama_paket' =>'required',
			'iuran' => 'required|numeric',
			'premi' => 'required|numeric',
			'operasional' => 'required|numeric',
			'cadangan' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('paket/create')->withErrors($validator)->withInput();
		}else{
			$paket = new Paket();
			$paket->id_paket = Input::get('id_paket');
			$paket->nama_paket = Input::get('nama_paket');
			$paket->iuran = Input::get('iuran');
			$paket->premi = Input::get('premi');
			$paket->operasional = Input::get('operasional');
			$paket->cadangan = Input::get('cadangan');
			$paket->save();
			
			Session::flash('message','Successfully created a Paket');
			return Redirect::to('paket')->with('page','Paket')->with('modul','Index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id_paket)
	{
		$paket = Paket::find($id_paket);
		$manfaat = Manfaat::where('id_paket',$id_paket)->get();
		return View::make('pht.paket.show')->with('paket',$paket)
		       ->with('manfaat',$manfaat)->with('page','Paket')->with('modul','Show');;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id_paket)
	{
		$paket = Paket::find($id_paket);
		return View::make('pht.paket.edit')->with('paket',$paket)->with('page','Paket')->with('modul','Edit');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id_paket)
	{
		$rules = array(
			'id_paket' =>'required|max:5',
			'nama_paket' => 'required',
			'iuran' => 'required|numeric',
			'premi' => 'required|numeric',
			'operasional' => 'required|numeric',
			'cadangan' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('paket/'.$id_paket.'/edit')->withErrors($validator);
		}else{
			$paket = Paket::find($id_paket);
			$paket->id_paket = Input::get('id_paket');
			$paket->nama_paket = Input::get('nama_paket');
			$paket->iuran = Input::get('iuran');
			$paket->premi = Input::get('premi');
			$paket->operasional = Input::get('operasional');
			$paket->cadangan = Input::get('cadangan');
			$paket->save();
			
			Session::flash('message','Successfully update a Paket');
			return Redirect::to('paket')->with('page','Paket')->with('modul','Index');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id_paket)
	{
		$paket = Paket::find($id_paket);
		$paket->delete();
		
		Session::flash('message','Successfully deleted Paket');
		return Redirect::to('paket')->with('page','Paket')->with('modul','Index');
	}
}
