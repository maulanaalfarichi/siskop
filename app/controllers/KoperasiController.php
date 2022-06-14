<?php

class KoperasiController extends \BaseController {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Koperasi::all(array('id','nama_koperasi','alamat','telp','fax','email')))
					->showColumns('id','nama_koperasi','alamat','telp','fax','email')
					->addColumn('',function($model){
						return '<a href="koperasi/'.$model->id.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="koperasi/'.$model->id.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="koperasi/'.$model->id.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('nama_koperasi','alamat')
					->orderColumns('nama_koperasi','alamat')
					->make();
		}
		return View::make('usp.koperasi.index')->withTitle('Koperasi');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('usp.koperasi.create')->with('page','Koperasi')
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
			'nama_koperasi' =>'required',
			'alamat' => 'required',
			'telp' => 'required',
			'fax' => 'required',
			'pengurus1' => 'required',
			'pengurus2' => 'required',
			'pengurus3' => 'required',
			'pengawas' => 'required',
			'email' => 'required',
			'simpanan_pokok' => 'required',
			'simpanan_wajib' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('koperasi/create')->withErrors($validator)->withInput();
		}else{
			$data = new Koperasi();
			$data->nama_koperasi = Input::get('nama_koperasi');
			$data->alamat = Input::get('alamat');
			$data->telp = Input::get('telp');
			$data->fax = Input::get('fax');
			$data->pengurus1 = Input::get('pengurus1');
			$data->pengurus2 = Input::get('pengurus2');
			$data->pengurus3 = Input::get('pengurus3');
			$data->pengawas = Input::get('pengawas');
			$data->email = Input::get('email');
			$data->simpanan_pokok = Input::get('simpanan_pokok');
			$data->simpanan_wajib = Input::get('simpanan_wajib');
			$data->save();
			
			Session::flash('message','Successfully created a Koperasi');
			return Redirect::to('koperasi')->with('page','Koperasi')->with('modul','Index');
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
		$data  = Koperasi::find($id);
		return View::make('usp.koperasi.show')->with('data',$data)
		->with('page','Koperasi')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Koperasi::find($id);
		return View::make('usp.koperasi.edit')->with('data',$data)
		->with('page','Koperasi')->with('modul','Edit');
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
			'nama_koperasi' =>'required',
			'alamat' => 'required',
			'telp' => 'required',
			'fax' => 'required',
			'pengurus1' => 'required',
			'pengurus2' => 'required',
			'pengurus3' => 'required',
			'pengawas' => 'required',
			'email' => 'required',
			'simpanan_pokok' => 'required',
			'simpanan_wajib' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('koperasi/'.$id.'/edit')->withErrors($validator)->withInput();
		}else{
			$data = Koperasi::find($id);
			$data->nama_koperasi = Input::get('nama_koperasi');
			$data->alamat = Input::get('alamat');
			$data->telp = Input::get('telp');
			$data->fax = Input::get('fax');
			$data->pengurus1 = Input::get('pengurus1');
			$data->pengurus2 = Input::get('pengurus2');
			$data->pengurus3 = Input::get('pengurus3');
			$data->pengawas = Input::get('pengawas');
			$data->email = Input::get('email');
			$data->simpanan_pokok = Input::get('simpanan_pokok');
			$data->simpanan_wajib = Input::get('simpanan_wajib');
			$data->save();
			
			Session::flash('message','Successfully update a Koperasi');
			return Redirect::to('koperasi')->with('page','Koperasi')->with('modul','Index');
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
		$data = Koperasi::find($id);
		$data->delete();
		
		Session::flash('message','Successfully deleted Koperasi');
		return Redirect::to('koperasi')->with('page','Koperasi')->with('modul','Index');
	}


}
