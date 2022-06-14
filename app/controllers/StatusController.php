<?php

class StatusController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Status::all(array('id_status','keterangan','tarif')))
					->showColumns('id_status','keterangan','tarif')
					->addColumn('',function($model){
						return '<a href="status/'.$model->id_status.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="status/'.$model->id_status.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="status/'.$model->id_status.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('id_status','keterangan')
					->orderColumns('id_status','keterangan')
					->make();
		}
		return View::make('pht.status.index')->withTitle('Status');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pht.status.create')->with('page','Status')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id_status' => 'required|max:2',
			'keterangan' =>'required',
			'tarif' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('status/create')->withErrors($validator)->withInput();
		}else{
			$status = new Status();
			$status->id_status = Input::get('id_status');
			$status->keterangan = Input::get('keterangan');
			$status->tarif = Input::get('tarif');
			$status->save();
			
			Session::flash('message','Successfully created a Status');
			return Redirect::to('status')->with('page','Status')->with('modul','Index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id_status)
	{
		$status = Status::find($id_status);
		return View::make('pht.status.show')->with('status',$status)->with('page','Peserta')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id_status)
	{
		$status = Status::find($id_status);
		return View::make('pht.status.edit')->with('status',$status)->with('page','Status')->with('modul','Edit');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id_status)
	{
		$rules = array(
			'id_status' =>'required|max:2',
			'keterangan' => 'required',
			'tarif' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('status/'.$id_status.'/edit')->withErrors($validator);
		}else{
			$status = Status::find($id_status);
			$status->id_status = Input::get('id_status');
			$status->keterangan = Input::get('keterangan');
			$status->tarif = Input::get('tarif');
			$status->save();
			
			Session::flash('message','Successfully update a Status');
			return Redirect::to('status')->with('page','Status')->with('modul','Index');;
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id_status)
	{
		$status = Status::find($id_status);
		$status->delete();
		
		Session::flash('message','Successfully deleted Status');
		return Redirect::to('status')->with('page','Status')->with('modul','Index');
	}


}
