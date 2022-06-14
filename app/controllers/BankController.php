<?php

class BankController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Bank::all(array('id_bank','nama_bank')))
					->showColumns('id_bank','nama_bank')
					->addColumn('',function($model){
						return '<a href="bank/'.$model->id_bank.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="bank/'.$model->id_bank.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="bank/'.$model->id_bank.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('id_bank','nama_bank')
					->orderColumns('id_bank','nama_bank')
					->make();
		}
		return View::make('pht.bank.index')->withTitle('Bank');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pht.bank.create')->with('page','Bank')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id_bank' => 'required|max:3',
			'nama_bank' =>'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('bank/create')->withErrors($validator)->withInput();
		}else{
			$bank = new Bank();
			$bank->id_bank = Input::get('id_bank');
			$bank->nama_bank = Input::get('nama_bank');
			$bank->save();
			
			Session::flash('message','Successfully created a Bank');
			return Redirect::to('bank')->with('page','Bank')->with('modul','Index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id_bank)
	{
		$bank = Bank::find($id_bank);
		return View::make('pht.bank.show')->with('bank',$bank)->with('page','Bank')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id_bank)
	{
		$bank = Bank::find($id_bank);
		return View::make('pht.bank.edit')->with('bank',$bank)->with('page','Bank')->with('modul','Edit');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id_bank)
	{
		$rules = array(
			'id_bank' =>'required|max:3',
			'nama_bank' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('bank/'.$id_bank.'/edit')->withErrors($validator);
		}else{
			$bank = Bank::find($id_bank);
			$bank->id_bank = Input::get('id_bank');
			$bank->nama_bank = Input::get('nama_bank');
			$bank->save();
			
			Session::flash('message','Successfully update a Bank');
			return Redirect::to('bank')->with('page','Bank')->with('modul','Index');;
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id_bank)
	{
		$bank = Bank::find($id_bank);
		$bank->delete();
		
		Session::flash('message','Successfully deleted Bank');
		return Redirect::to('bank')->with('page','Bank')->with('modul','Index');
	}


}
