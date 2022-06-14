<?php

class JurnalumumController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Vjournalheader::all(array('no_bukti','tanggal','keterangan','debet','kredit')))
					->showColumns('no_bukti','tanggal','keterangan','debet','kredit')
					->addColumn('',function($model){
						return '<a href="jurnalumum/'.$model->no_bukti.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="jurnalumum/'.$model->no_bukti.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="jurnalumum/'.$model->no_bukti.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('no_bukti','tanggal','keterangan')
					->orderColumns('no_bukti','tanggal','keterangan')
					->make();
		}
		return View::make('accounting.jurnalumum.index')->withTitle('Jurnal Umum');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$jurnal = Accjournalheader::paginate(5);
		$posisi = Accposisi::Lists('keterangan','id_posisi');
		$rekening = Accrekening::Lists('nama_rekening','id_rekening');
		return View::make('accounting.jurnalumum.create')->with('jurnal',$jurnal)
						->with('rekening',$rekening)
						->with('posisi',$posisi)->with('page','Jurnal')
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
			'tanggal' =>'required',
			'keterangan' => 'required',
			'jumlah' => 'required',
			'id_rekening' =>'required',
			'id_posisi' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('jurnalumum/create')->withErrors($validator)->withInput();
		}else{
			$nomor = $this->nomor();
			//input journal header
			$accjournalheader = new Accjournalheader();
			$accjournalheader->no_bukti = $nomor; //cari nomor dulu
			$accjournalheader->tanggal = date('Y-m-d',strtotime(Input::get('tanggal')));
			$accjournalheader->keterangan = Input::get('keterangan');
			if(strtoupper(Input::get('id_posisi'))=='DEBET')
			{
				$accjournalheader->debet = Input::get('jumlah');
			}else{
				$accjournalheader->kredit = Input::get('jumlah');
			}
			$accjournalheader->save();
			
			//masukan data ke journal detailnya:
			$accjournaldetail = new Accjournaldetail();
			$accjournaldetail->no_bukti = $nomor;
			$accjournaldetail->id_rekening = Input::get('id_rekening');
			if(strtoupper(Input::get('id_posisi'))=='DEBET')
			{
				$accjournaldetail->debet = Input::get('jumlah');
			}else{
				$accjournaldetail->kredit = Input::get('jumlah');
			}
			$accjournaldetail->save();
			
			Session::flash('message','Successfully created a Journal :'.$nomor);
			$jurnal = Accjournalheader::find($nomor);
			$detail = Accjournaldetail::where('no_bukti','=',$nomor)->get();
			$rekening = Accrekening::Lists('nama_rekening','id_rekening');
			$posisi = Accposisi::Lists('keterangan','id_posisi');
			$jurnal = Accjournalheader::paginate(5);
			return View::make('accounting.jurnalumum.index')
			                    ->with('posisi',$posisi)->with('rekening',$rekening)
								->with('jurnal',$jurnal)->with('detail',$detail)
								->with('page','Journal Umum')->with('modul','Edit');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($no_bukti)
	{
		$jurnal = Accjournalheader::find($no_bukti);
		$detail = Accjournaldetail::where('no_bukti',$no_bukti)->get();
		return View::make('accounting.jurnalumum.show')->with('jurnal',$jurnal)
		            ->with('detail',$detail);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($no_bukti)
	{
		$jurnal = Accjournalheader::find($no_bukti);
		if ($jurnal->posting ==1 ){
			$jurnal = Accjournalheader::paginate(5);
			Session::flash('message','No_bukti '.$no_bukti.' Has been posted!');
			return View::make('accounting.jurnalumum.index')->with('jurnal',$jurnal)
							->with('page','Jurnal')->with('modul','Create');	
		}else{
			$detail = Accjournaldetail::where('no_bukti','=',$no_bukti)->get();
			$rekening = Accrekening::Lists('nama_rekening','id_rekening');
			$posisi = Accposisi::Lists('keterangan','id_posisi');
			return View::make('accounting.jurnalumum.edit')
								->with('posisi',$posisi)->with('rekening',$rekening)
								->with('jurnal',$jurnal)->with('detail',$detail)
								->with('page','Journal Umum')->with('modul','Edit');
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($no_bukti)
	{
		$jurnal = Accjournalheader::find($no_bukti);
		if(strtoupper(Input::get('id_posisi'))=='DEBET')
		{
			$jurnal->debet = $jurnal->debet + Input::get('jumlah');
		}else{
			$jurnal->kredit = $jurnal->debet + Input::get('jumlah');
		}
		$jurnal->save();
		
		//masukan nilai detail
		$detail = new Accjournaldetail();
		$detail->no_bukti = Input::get('no_bukti');
		$detail->id_rekening = Input::get('id_rekening');
		if(strtoupper(Input::get('id_posisi'))=='DEBET')
		{
			$detail->debet = Input::get('jumlah');
		}else{
			$detail->kredit = Input::get('jumlah');
		}
		$detail->save();
		
		Session::flash('message','Successfully Updated a Journal');
		$jurnal = Accjournalheader::find(Input::get('no_bukti'));
		$detail = Accjournaldetail::where('no_bukti','=',Input::get('no_bukti'))->get();
		$rekening = Accrekening::Lists('nama_rekening','id_rekening');
		$posisi = Accposisi::Lists('keterangan','id_posisi');
		return View::make('accounting.jurnalumum.edit')
		                    ->with('posisi',$posisi)->with('rekening',$rekening)
							->with('jurnal',$jurnal)->with('detail',$detail)
							->with('page','Journal Umum')->with('modul','Edit');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($no_bukti)
	{
		$accjournaldetail = Accjournaldetail::where('no_bukti',$no_bukti);
		$accjournaldetail->delete();
		
		$jurnal = Accjournalheader::where('no_bukti',$no_bukti);
		$jurnal->delete();
			
		Session::flash('message','Successfully deleted Journal');
		$jurnal = Accjournalheader::paginate(5);
		return Redirect::to('jurnalumum');
	}

	
	public function nomor(){		
		$tahun = substr(Input::get('tanggal'),6,4);
		$bulan = substr(Input::get('tanggal'),3,2);
		
		$jurnal = DB::table('acc_journal_headers')->select('no_bukti')->where(DB::raw('substring(no_bukti,1,4)'),$tahun)
		                                ->where(DB::raw('substring(no_bukti,5,2)'),$bulan)
										->orderBy('no_bukti','desc')->first();
		
		if(empty($jurnal)){
			$nomor = strval($tahun).strval($bulan).strval('0001');	 
		}else{
			$nomor = $jurnal->no_bukti+1;
		}
		
		return $nomor;
	}
	
	public function carijurnalumum(){		
		$jurnal = Accjournalheader::where('keterangan','like','%'.Input::get('keterangan').'%')->get();
		return View::make('accounting.jurnalumum.index')->with('jurnal',$jurnal)
						->with('page','Jurnal')->with('modul','Create');
	}


}
