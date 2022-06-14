<?php

class SetupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Vrekening::all(array('id_rekening','nama_rekening','saldo_awal_debet','saldo_awal_kredit')))
					->showColumns('id_rekening','nama_rekening','saldo_awal_debet','saldo_awal_kredit')
					->addColumn('',function($model){
						return '<a href="setup/'.$model->id_rekening.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="setup/'.$model->id_rekening.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="setup/'.$model->id_rekening.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('id_rekening','nama_rekening','saldo_awal_debet','saldo_awal_kredit')
					->orderColumns('id_rekening','nama_rekening','saldo_awal_debet','saldo_awal_kredit')
					->make();
		}
		return View::make('accounting.setup.index')->withTitle('Setup');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$klasifikasi = Accklasifikasi::Lists('keterangan','id_klasifikasi');
		$rekening = Accrekening::Lists('nama_rekening','id_rekening');
		$golongan = Golongan::Lists('nama_golongan','id');
		return View::make('accounting.setup.create')->with('klasifikasi',$klasifikasi)
						->with('rekening',$rekening)->with('golongan',$golongan)
						->with('page','Setup')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id_rekening' => 'required|max:6',
			'nama_rekening' =>'required',
			'id_klasifikasi' => 'required|min:1',
			'parent_id' => 'required',
			'normal_balance' =>'required',
			'id_golongan' => 'required',
			'saldo_awal_debet' => 'required',
			'saldo_awal_kredit' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('setup/create')->withErrors($validator)->withInput();
		}else{
			$rekening = new Accrekening();
			$rekening->id_rekening = Input::get('id_rekening');
			$rekening->nama_rekening = Input::get('nama_rekening');
			$rekening->id_klasifikasi = Input::get('id_klasifikasi');
			$rekening->parent_id = Input::get('parent_id');
			$rekening->normal_balance = Input::get('normal_balance');
			$rekening->id_golongan = Input::get('id_golongan');
			$rekening->saldo_awal_debet = Input::get('saldo_awal_debet');
			$rekening->saldo_awal_kredit = Input::get('saldo_awal_kredit');
			$rekening->save();
			
			
			Session::flash('message','Successfully created a Rekening');
			return Redirect::to('setup')->with('page','Rekening')->with('modul','Index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id_rekening)
	{
		$setup = Accrekening::find($id_rekening);
		return View::make('accounting.setup.show')->with('setup',$setup)->with('page','Setup')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id_rekening)
	{
		$setup = Accrekening::find($id_rekening);
		$klasifikasi = Accklasifikasi::Lists('keterangan','id_klasifikasi');
		$rekening = Accrekening::Lists('nama_rekening','id_rekening');
		$golongan = Golongan::Lists('nama_golongan','id');
		return View::make('accounting.setup.edit')->with('setup',$setup)
						  ->with('klasifikasi',$klasifikasi)->with('rekening',$rekening)
		                  ->with('golongan',$golongan)
						  ->with('page','Setup')->with('modul','Edit');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id_rekening)
	{
		$rules = array(
			'id_rekening' => 'required|max:6',
			'nama_rekening' =>'required',
			'id_klasifikasi' => 'required|min:1',
			'parent_id' => 'required',
			'normal_balance' =>'required',
			'id_golongan' => 'required',
			'saldo_awal_debet' => 'required',
			'saldo_awal_kredit' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('setup/'.$id_rekening.'/edit')->withErrors($validator);
		}else{
			$rekening = Accrekening::find($id_rekening);
			$rekening->nama_rekening = Input::get('nama_rekening');
			$rekening->id_klasifikasi = Input::get('id_klasifikasi');
			$rekening->parent_id = Input::get('parent_id');
			$rekening->normal_balance = Input::get('normal_balance');
			$rekening->id_golongan = Input::get('id_golongan');
			$rekening->saldo_awal_debet = Input::get('saldo_awal_debet');
			$rekening->saldo_awal_kredit = Input::get('saldo_awal_kredit');
			$rekening->save();
			
			Session::flash('message','Successfully update a Rekening');
			return Redirect::to('setup')->with('page','Setup')->with('modul','Index');;
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id_rekening)
	{
		$setup = Accrekening::find($id_rekening);
		$setup->delete();
		
		Session::flash('message','Successfully deleted Rekening');
		return Redirect::to('setup')->with('page','Setup')->with('modul','Index');
	}
	
	public function carirekening(){		
		$setup = Accrekening::where('nama_rekening','like','%'.Input::get('nama_rekening').'%')->get();
		return View::make('accounting.setup.index')->with('setup',$setup)->with('page','Setup')->with('modul','Index');
	
	}


}
