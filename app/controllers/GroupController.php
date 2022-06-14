<?php

class GroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$group = Group::paginate(5);
		return View::make('sentry.group.index')->with('group',$group)
		         ->with('page','Group')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sentry.group.create')->with('page','Group')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'group' => 'required',
		);
	 
		$validator = Validator::make(Input::all(), $rules);
	 
		if ($validator->fails()) {  
			return Redirect::to('group/create')->withErrors($validator)->withInput();
		} else {           
			 
			try
			{
				$group = Sentry::createGroup(array(
					'name'        => Input::get('group'),
					'permissions' => Input::get('cb'),
				));
			}
			catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
			{
				Session::flash('message', 'Name field is required');
				return Redirect::to('group')->with('page','Group')->with('modul','Create');
			}
			catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
			{
				Session::flash('message', 'Group already exists');
				return Redirect::to('group')->with('page','Group')->with('modul','Create');
			}
	 
		Session::flash('message', 'Data Berhasil Ditambahkan');
		return Redirect::to('group')->with('page','Group')->with('modul','Index');
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$groupbyid = Group::findOrFail($id);
		$groupbyid =
		[
			'groupbyid' => $groupbyid
		];
		return View::make('sentry.group.edit', $groupbyid)->with('page','Group')->with('modul','Edit');
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
			'group' => 'required',
		);
	 
		$validator = Validator::make(Input::all(), $rules);
	 
		if ($validator->fails()) {  
			return Redirect::to('group/'.$id.'/edit')->withErrors($validator)->withInput();
		} else {
			 
			try
			{
			$group = Sentry::findGroupById($id);
			$arrexs = array();
			foreach ($group->permissions as $key => $value) {
				if (array_key_exists($key, Input::get('cb'))) {
						$arrexs[$key] = '1';
				}
			}
			$arrexs2 = array();
			foreach ($group->permissions as $key => $value) {
				if (!array_key_exists($key, $arrexs)) {
						$arrexs2[$key] = '0';
				}
			}
			$arrexs3 = array_merge($arrexs2,Input::get('cb'));
			$group->name = Input::get('group');
			$group->permissions = $arrexs3;
			$group->permissions = array();
	 
			if ($group->save())
			{
				Session::flash('message', 'Data Berhasil Diubah');
				return Redirect::to('group')->with('page','Group')->with('modul','Edit');  
			}
			else
			{
				Session::flash('message', 'Data Gagal Diubah');
				return Redirect::to('group')->with('page','Group')->with('modul','Edit');
			}
			}
			catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
			{
				Session::flash('message', 'Name field is required');
				return Redirect::to('group')->with('page','Group')->with('modul','Edit');
			}
			catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
			{
				Session::flash('message', 'Group already exists');
				return Redirect::to('group')->with('page','Group')->with('modul','Edit');
			}
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
			{
				Session::flash('message', 'Group was not found.');
				return Redirect::to('group')->with('page','Group')->with('modul','Edit');
			}
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
		try
		{
			$group = Sentry::findGroupById($id);
			$group->delete();
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			echo 'Group was not found.';
		}
	 
		Session::flash('message', 'Data Berhasil Dihapus');
		return Redirect::to('group')->with('page','Group')->with('modul','Index');
	}


}
