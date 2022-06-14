<?php

class JenissimpananController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Jenissimpan::all(array(DB::raw('id,jenis_simpanan,format(jumlah,2)as jumlah'))))
					->showColumns('id','jenis_simpanan','jumlah')
					->addColumn('',function($model){
						return '<a href="jenissimpanan/'.$model->id.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="jenissimpanan/'.$model->id.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="jenissimpanan/'.$model->id.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('jenis_simpanan')
					->orderColumns('jenis_simpanan')
					->make();
		}
		return View::make('usp.jenissimpan.index')->withTitle('Jenis Simpanan');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('usp.jenissimpan.create')->with('page','Jenis Simpanan')
		->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'jenis_simpanan' => 'required',
			'jumlah' =>'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('jenissimpanan/create')->withErrors($validator)->withInput();
		}else{
			$data = new Jenissimpan();
			$data->jenis_simpanan = Input::get('jenis_simpanan');
			$data->jumlah = Input::get('jumlah');
			$data->save();
			
			Session::flash('message','Successfully created a Jenis Simpanan');
			return Redirect::to('jenissimpanan')->with('page','Jenis Simpan')->with('modul','Index');
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
		$jenissimpan = Jenissimpan::find($id);
		return View::make('usp.jenissimpan.show')->with('jenissimpan',$jenissimpan)
		->with('page','Jenis Simpan')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Jenissimpan::find($id);
		return View::make('usp.jenissimpan.edit')->with('data',$data)
		->with('page','Jenis Simpanan')->with('modul','Edit');
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
			'jenis_simpanan' =>'required',
			'jumlah' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('jenissimpanan/'.$id.'/edit')->withErrors($validator);
		}else{
			$data = Jenissimpan::find($id);
			$data->jenis_simpanan = Input::get('jenis_simpanan');
			$data->jumlah = Input::get('jumlah');
			$data->save();
			
			Session::flash('message','Successfully update a Jenis Simpanan');
			return Redirect::to('jenissimpanan')->with('page','Jenis Simpanan')
			->with('modul','Index');;
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
		$data = Jenissimpan::find($id);
		$data->delete();
		
		Session::flash('message','Successfully deleted Jenis Simpanan');
		return Redirect::to('jenissimpanan')->with('page','Jenis Simpanan')->with('modul','Index');
	}


}
