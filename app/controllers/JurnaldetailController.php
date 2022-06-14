<?php

class JurnaldetailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
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
		$data = Accjournaldetail::find($id);
		

		$jurnal = Accjournalheader::find($data->no_bukti);
		$jurnal->debet = $jurnal->debet - $data->debet;
		$jurnal->kredit = $jurnal->kredit - $data->kredit;
		$jurnal->save();

		$data->delete();

		Session::flash('message','Successfully Updated a Journal');
		$jurnal = Accjournalheader::find($data->no_bukti);
		$detail = Accjournaldetail::where('no_bukti','=',$data->no_bukti)->get();
		$rekening = Accrekening::Lists('nama_rekening','id_rekening');
		$posisi = Accposisi::Lists('keterangan','id_posisi');
		return View::make('accounting.jurnalumum.edit')
		                    ->with('posisi',$posisi)->with('rekening',$rekening)
							->with('jurnal',$jurnal)->with('detail',$detail)
							->with('page','Journal Umum')->with('modul','Edit');
	}


}
