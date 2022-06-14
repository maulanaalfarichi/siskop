<?php

class AnggotaController extends \BaseController {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Vanggota::all();
						
		
		if(Datatable::shouldHandle())
		{
			return Datatable::collection($data)
					->showColumns('id','nama_anggota','jk','tempat_lahir','tanggal_lahir','alamat','hp','nama_koperasi')
					->addColumn('',function($model){
						return '<a href="anggota/'.$model->id.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="anggota/'.$model->id.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="anggota/'.$model->id.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('nama_anggota','nama_koperasi')
					->orderColumns('nama_anggota','nama_koperasi')
					->make();
		}
		return View::make('usp.anggota.index')->withTitle('Anggota');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = Pdam::lists('nama_pdam','id_pdam');
		return View::make('usp.anggota.create')->with('data',$data)
		->with('page','Anggota')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id' => 'required|max:8',
			'nama_anggota' =>'required',
			'jk' => 'required',
			'tempat_lahir' => 'required',
			'tanggal_lahir' => 'required',
			'alamat' => 'required',
			'hp' => 'required',
			'no_identitas' => 'required',
			'id_pdam' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('anggota/create')->withErrors($validator)->withInput();
		}else{
			$data = new Anggota();
			$data->id = Input::get('id');
			$data->nama_anggota = Input::get('nama_anggota');
			$data->jk = Input::get('jk');
			$data->tempat_lahir = Input::get('tempat_lahir');
			$data->tanggal_lahir = Input::get('tanggal_lahir');
			$data->alamat = Input::get('alamat');
			$data->hp = Input::get('hp');
			$data->no_identitas = Input::get('no_identitas');
			$data->id_pdam = Input::get('id_pdam');
			$data->save();
			
			Session::flash('message','Successfully created a Angota');
			return Redirect::to('anggota')->with('page','Anggota')->with('modul','Index');
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
		$data  = Anggota::find($id);
		return View::make('usp.anggota.show')->with('data',$data)
		->with('page','Anggota')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Anggota::find($id);
		$pdam = Pdam::lists('nama_pdam','id_pdam');
		return View::make('usp.anggota.edit')->with('data',$data)->with('pdam',$pdam)
		->with('page','Anggota')->with('modul','Edit');
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
			'id' => 'required|max:8',
			'nama_anggota' =>'required',
			'jk' => 'required',
			'tempat_lahir' => 'required',
			'tanggal_lahir' => 'required',
			'alamat' => 'required',
			'hp' => 'required',
			'no_identitas' => 'required',
			'id_pdam' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('anggota/'.$id.'/edit')->withErrors($validator)->withInput();
		}else{
			$data = Anggota::find($id);
			$data->nama_anggota = Input::get('nama_anggota');
			$data->jk = Input::get('jk');
			$data->tempat_lahir = Input::get('tempat_lahir');
			$data->tanggal_lahir = Input::get('tanggal_lahir');
			$data->alamat = Input::get('alamat');
			$data->hp = Input::get('hp');
			$data->no_identitas = Input::get('no_identitas');
			$data->id_pdam = Input::get('id_pdam');
			$data->save();
			
			Session::flash('message','Successfully update a Angota');
			return Redirect::to('anggota')->with('page','Anggota')->with('modul','Index');
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
		$data = Anggota::find($id);
		$data->delete();
		
		Session::flash('message','Successfully deleted Anggota');
		return Redirect::to('anggota')->with('page','Anggota')->with('modul','Index');
	}


}
