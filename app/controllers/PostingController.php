<?php

class PostingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Posting::all(array('id','tanggal','debet','kredit')))
					->showColumns('tanggal','debet','kredit')
					->addColumn('',function($model){
						return '<a href="posting/'.$model->id.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Detail</a>';
					})
					->searchColumns('id','debet','kredit')
					->orderColumns('id','debet','kredit')
					->make();
		}
		return View::make('accounting.posting.index')->withTitle('Posting)');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = DB::table('acc_journal_headers')->select('tanggal')->distinct('tanggal')->where('posting','=',0)->lists('tanggal','tanggal');
		return View::make('accounting.posting.create')->with('data',$data)
			->with('page','Posting')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'tanggal' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('posting/create')->withErrors($validator)->withInput();
		}else{
			$posting = Accjournalheader::where('tanggal','=',Input::get('tanggal'))->update(array('posting' => 1));
			$data = DB::table('v_posting')->paginate(5);
			Session::flash('message','Successfully created a posting');
			return View::make('accounting.posting.index')->with('data',$data)->with('page','Posting')->with('modul','Index');
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
		$data = DB::table('acc_journal_headers')->where('tanggal','=',$id)
			->where('posting','=',1)->get();
		return View::make('accounting.posting.show')->with('data',$data)
			->with('page','Posting')->with('modul','Detail');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Accjournalheader::find($id);
		$detail = Accjournaldetail::where('no_bukti','=',$id)->get();
		
		return View::make('accounting.posting.edit')->with('data',$data)
			->with('detail',$detail)->with('page','Posting')
			->with('modul','Detail Journal');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
	
	public function cariposting()
	{
		$tanggal = date('Y-m-d',strtotime(Input::get('tanggal')));
		$data = DB::table('v_posting')->where('id','=',$tanggal)->get();
		return View::make('accounting.posting.index')->with('data',$data)
			->with('page','Posting')->with('modul','Index');
	}


}
