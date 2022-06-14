<?php

class SubaccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subaccount = Subaccount::paginate(5);
		return View::make('subaccount.index')->with('subaccount',$subaccount);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('subaccount.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id' => 'required|max:1',
			'subaccount_name' =>'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('subaccount/create')->withErrors($validator)->withInput();
		}else{
			$subaccount = new Subaccount();
			$subaccount->id = Input::get('id');
			$subaccount->subaccount_name = Input::get('subaccount_name');
			$subaccount->save();
			
			Session::flash('message','Successfully created a subaccount');
			return Redirect::to('subaccount');
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
		$subaccount = Subaccount::find($id);
		return View::make('subaccount.show')->with('subaccount',$subaccount);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subaccount = Subaccount::find($id);
		return View::make('subaccount.edit')->with('subaccount',$subaccount);
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
			'id' =>'required|max:1',
			'subaccount_name' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('subaccount/'.$id.'/edit')->withErrors($validator);
		}else{
			$subaccount = Subaccount::find($id);
			$subaccount->id = Input::get('id');
			$subaccount->subaccount_name = Input::get('subaccount_name');
			$subaccount->save();
			
			Session::flash('message','Successfully update a subaccount');
			return Redirect::to('subaccount');
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
		$subaccount = Subaccount::find($id);
		$subaccount->delete();
		
		Session::flash('message','Successfully deleted subaccount');
		return Redirect::to('subaccount');
	}


}
