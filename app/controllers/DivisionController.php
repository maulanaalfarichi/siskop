<?php

class DivisionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$divisi = Division::paginate(5);
		return View::make('divisions.index')->with('divisi',$divisi);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('divisions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id' => 'required|max:4',
			'division_name' =>'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('division/create')->withErrors($validator)->withInput();
		}else{
			$divisi = new Division();
			$divisi->id = Input::get('id');
			$divisi->division_name = Input::get('division_name');
			$divisi->save();
			
			Session::flash('message','Successfully created a division');
			return Redirect::to('division');
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
		$divisi = Division::find($id);
		return View::make('divisions.show')->with('divisi',$divisi);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$divisi = Division::find($id);
		return View::make('divisions.edit')->with('divisi',$divisi);
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
			'id' =>'required|max:4',
			'division_name' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('division/'.$id.'/edit')->withErrors($validator);
		}else{
			$divisi = Division::find($id);
			$divisi->id = Input::get('id');
			$divisi->division_name = Input::get('division_name');
			$divisi->save();
			
			Session::flash('message','Successfully update a division');
			return Redirect::to('division');
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
		$divisi = Division::find($id);
		$divisi->delete();
		
		Session::flash('message','Successfully deleted divisions');
		return Redirect::to('division');
	}
	
	public function search($id)
	{
	
	}


}
