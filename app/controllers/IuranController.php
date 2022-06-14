<?php

class IuranController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Iuran::all(array('id','id_peserta','cicilan_ke','iuran','tanggal_bayar','status')))
					->showColumns('id_peserta','cicilan_ke','iuran','tanggal_bayar','status')
					->addColumn('',function($model){
						return '<a href="iuran/'.$model->id.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="iuran/'.$model->id.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="iuran/'.$model->id.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('id_peserta','cicilan_ke','iuran','tanggal_bayar','status')
					->orderColumns('id_peserta','cicilan_ke','iuran','tanggal_bayar','status')
					->make();
		}
		return View::make('pht.iuran.index')->withTitle('Iuran');
		}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pht.iuran.create')->with('page','Iuran')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nama_peserta' => 'required' 
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('iuran')->withErrors($validator)->withInput();
		}else{
			$nama_peserta = Input::get('nama_peserta');

			$peserta = Peserta::where('nama_peserta','LIKE','%'.$nama_peserta.'%')
			            ->lists('id_peserta','id_peserta');
			$iuran = Iuran::whereIn('id_peserta',$peserta)->get();
			
			return View::make('pht.iuran.index')->with('iuran',$iuran)
					->with('nama_peserta',Input::get('nama_peserta'))
					->with('page','Pembayaran Iuran')->with('modul','Index');
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
		$iuran = Iuran::find($id);
		return View::make('pht.iuran.show')->with('iuran',$iuran)->with('page','Iuran')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$iuran = Iuran::find($id);
		$bank = Bank::Lists('nama_bank','id_bank');
		if (strtoupper($iuran->status)=='LUNAS'){ $status = 'disabled'; }else{ $status= ''; }
		return View::make('pht.iuran.edit')->with('iuran',$iuran)->with('bank',$bank)
		->with('status',$status)->with('page','Iuran')->with('modul','Payment');
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
			'id_peserta' =>'required|max:10',
			'cicilan_ke' => 'required',
			'iuran' => 'required|numeric',
			'status' => 'required',
			'id_bank' => 'required',
			'tanggal_bayar' => array('required','date_format:d-m-Y'),
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('iuran/'.$id.'/edit')->withErrors($validator);
		}else{
			$iuran = Iuran::find($id);
			$iuran->keterangan = Input::get('keterangan');
			$iuran->status = Input::get('status');
			$iuran->tanggal_bayar = date('Y-m-d',strtotime(Input::get('tanggal_bayar')));
			$iuran->id_bank = Input::get('id_bank');
			$iuran->save();
			
			$peserta = Peserta::find(Input::get('id_peserta'));
			$peserta->id_status = 0;
			$peserta->save();
			
			Session::flash('message','Successfully update a Iuran');
			
			$iuran = Iuran::where('id_peserta',Input::get('id_peserta'))->get();
			
			return Redirect::to('iuran')->with('id_peserta',Input::get('id_peserta'))
			       ->with('iuran',$iuran)->with('page','Pembayaran Iuran')->with('modul','Index');;
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
		//
	}


}
