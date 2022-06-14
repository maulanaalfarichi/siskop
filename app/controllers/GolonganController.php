<?php

class GolonganController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Golongan::all(array('id','nama_golongan')))
					->showColumns('id','nama_golongan')
					->addColumn('',function($model){
						return '<a href="golongan/'.$model->id.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="golongan/'.$model->id.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="golongan/'.$model->id.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('id','nama_golongan')
					->orderColumns('id','nama_golongan')
					->make();
		}
		return View::make('accounting.golongan.index')->withTitle('Golongan');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('accounting.golongan.create')->with('page','Golongan')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nama_golongan' =>'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('golongan/create')->withErrors($validator)->withInput();
		}else{
			$data = new Golongan();
			$data->nama_golongan = Input::get('nama_golongan');
			$data->save();
			
			Session::flash('message','Successfully created a Golongan');
			return Redirect::to('golongan')->with('page','Golongan')->with('modul','Index');
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
		$data = Golongan::find($id);
		return View::make('accounting.golongan.show')->with('data',$data)
		->with('page','Golongan')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Golongan::find($id);
		return View::make('accounting.golongan.edit')->with('data',$data)
		->with('page','Golongan')->with('modul','Show');
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
			'nama_golongan' =>'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('golongan/'.$id.'/edit')->withErrors($validator)->withInput();
		}else{
			$data = Golongan::find($id);
			$data->nama_golongan = Input::get('nama_golongan');
			$data->save();
			
			Session::flash('message','Successfully update a Golongan');
			return Redirect::to('golongan')->with('page','Golongan')->with('modul','Index');
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
		$data = Golongan::find($id);
		$data->delete();
		
		Session::flash('message','Successfully deleted Golongan');
		return Redirect::to('golongan')->with('page','Golongan')->with('modul','Index');
	}
	
	public function carigolongan(){		
		$data = Golongan::where('nama_golongan','like','%'.Input::get('nama_golongan').'%')->get();
		return View::make('accounting.golongan.index')->with('data',$data)
		->with('page','Golongan')->with('modul','Index');
	}


}
