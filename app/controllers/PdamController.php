<?php

class PdamController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Pdam::all(array('id_pdam','nama_pdam','telepon','fax')))
					->showColumns('id_pdam','nama_pdam','telepon','fax')
					->addColumn('',function($model){
						return '<a href="pdam/'.$model->id_pdam.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="pdam/'.$model->id_pdam.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="pdam/'.$model->id_pdam.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('id_pdam','nama_pdam','telepon','fax')
					->orderColumns('id_pdam','nama_pdam','telepon','fax')
					->make();
		}
		return View::make('pht.pdam.index')->withTitle('Pdam');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pht.pdam.create')->with('page','PDAM')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nama_pdam' =>'required',
			'alamat' => 'required',
			'telepon' => 'required',
			'fax' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('pdam/create')->withErrors($validator)->withInput();
		}else{
			$pdam = new Pdam();
			$pdam->nama_pdam = Input::get('nama_pdam');
			$pdam->alamat = Input::get('alamat');
			$pdam->telepon = Input::get('telepon');
			$pdam->fax = Input::get('fax');
			$pdam->save();
			
			Session::flash('message','Successfully created a PDAM');
			return Redirect::to('pdam')->with('page','PDAM')->with('modul','Index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id_pdam)
	{
		$pdam = Pdam::find($id_pdam);
		return View::make('pht.pdam.show')->with('pdam',$pdam)->with('page','Paket')->with('modul','Show');;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id_pdam)
	{
		$pdam = Pdam::find($id_pdam);
		return View::make('pht.pdam.edit')->with('pdam',$pdam)->with('page','PDAM')->with('modul','Edit');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id_pdam)
	{
		$rules = array(
			'nama_pdam' =>'required',
			'alamat' => 'required',
			'telepon' => 'required',
			'fax' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('pdam/'.$id_pdam.'/edit')->withErrors($validator);
		}else{
			$pdam = Pdam::find($id_pdam);
			$pdam->nama_pdam = Input::get('nama_pdam');
			$pdam->alamat = Input::get('alamat');
			$pdam->telepon = Input::get('telepon');
			$pdam->fax = Input::get('fax');
			$pdam->save();
			
			Session::flash('message','Successfully update a PDAM');
			return Redirect::to('pdam')->with('page','PDAM')->with('modul','Index');;
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id_pdam)
	{
		$pdam = Pdam::find($id_pdam);
		$pdam->delete();
		
		Session::flash('message','Successfully deleted PDAM');
		return Redirect::to('pdam')->with('page','PDAM')->with('modul','Index');
	}


}
