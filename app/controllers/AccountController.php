<?php

class AccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$account = Account::paginate(5);
		return View::make('account.index')->with('account',$account);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('account.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id' => 'required|max:10',
			'account_name' =>'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('account/create')->withErrors($validator)->withInput();
		}else{
			$account = new Account();
			$account->id = Input::get('id');
			$account->account_name = Input::get('account_name');
			$account->save();
			
			Session::flash('message','Successfully created a account');
			return Redirect::to('account');
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
		$account = Account::find($id);
		return View::make('account.show')->with('account',$account);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$account = Account::find($id);
		return View::make('account.edit')->with('account',$account);
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
			'id' =>'required|max:10',
			'account_name' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('account/'.$id.'/edit')->withErrors($validator);
		}else{
			$account = Account::find($id);
			$account->id = Input::get('id');
			$account->account_name = Input::get('account_name');
			$account->save();
			
			Session::flash('message','Successfully update a account');
			return Redirect::to('account');
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
		$account = Account::find($id);
		$account->delete();
		
		Session::flash('message','Successfully deleted account');
		return Redirect::to('account');
	}


}
