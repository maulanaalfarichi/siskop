<?php

class PesertaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Peserta::all(array('id_peserta','nama_peserta','id_paket','tanggal_lahir','id_pdam','id_status')))
					->showColumns('id_peserta','nama_peserta','id_paket','tanggal_lahir','id_pdam','id_status')
					->addColumn('',function($model){
						return '<a href="peserta/'.$model->id_peserta.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="peserta/'.$model->id_peserta.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="peserta/'.$model->id_peserta.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('id_peserta','nama_peserta','id_paket','tanggal_lahir','id_pdam','id_status')
					->orderColumns('id_peserta','nama_peserta','id_paket','tanggal_lahir','id_pdam','id_status')
					->make();
		}
		return View::make('pht.peserta.index')->withTitle('Peserta');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$pdam = Pdam::Lists('nama_pdam','id_pdam');
		$paket = Paket::Lists('nama_paket','id_paket');
		$bank = Bank::Lists('nama_bank','id_bank');
		$status = Status::Lists('keterangan','id_status');
		return View::make('pht.peserta.create')->with('page','Peserta')->with('modul','Create')
		             ->with('pdam',$pdam)->with('paket',$paket)->with('bank',$bank)
					 ->with('status',$status);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nama_peserta' =>'required|max:60',
			'tempat_lahir' => 'required',
			'tanggal_lahir' => array('required','date_format:d-m-Y'),
			'jenis_kelamin' => 'required',
			'alamat' => 'required',
			'telpon' => 'required',
			'handphone' => 'required',
			'id_pdam' => 'required',
			'id_paket' => 'required',
			'tanggal_masuk' => array('required','date_format:d-m-Y'),
			'tanggal_berhenti' => 'date_format:d-m-Y',
			'tanggal_proses' => 'date_format:d-m-Y',
			'nama_ahli_waris' => 'required',
			'id_bank' => 'required',
			'nomor_rekening' => 'required|numeric',
			'atas_nama' => 'required',
			'id_status' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('peserta/create')->withErrors($validator)->withInput();
		}else{
			$peserta = new Peserta();
			$peserta->id_peserta = $this->nomor();
			$peserta->nama_peserta = Input::get('nama_peserta');
			$peserta->tempat_lahir = Input::get('tempat_lahir');
			$peserta->tanggal_lahir = date('Y-m-d',strtotime(Input::get('tanggal_lahir')));
			$peserta->jenis_kelamin = Input::get('jenis_kelamin');
			$peserta->alamat = Input::get('alamat');
			$peserta->telpon = Input::get('telpon');
			$peserta->handphone = Input::get('handphone');
			$peserta->id_pdam = Input::get('id_pdam');
			$peserta->id_paket = Input::get('id_paket');
			$peserta->tanggal_masuk = date('Y-m-d',strtotime(Input::get('tanggal_masuk')));
			$peserta->tanggal_berhenti = date('Y-m-d',strtotime(Input::get('tanggal_berhenti')));
			$peserta->tanggal_proses = date('Y-m-d',strtotime(Input::get('tanggal_proses')));
			$peserta->nama_ahli_waris = Input::get('nama_ahli_waris');
			$peserta->id_bank = Input::get('id_bank');
			$peserta->nomor_rekening = Input::get('nomor_rekening');
			$peserta->atas_nama = Input::get('atas_nama');
			$peserta->id_status = Input::get('id_status');
			$peserta->save();
			$nomor = $this->nomor() - 1;
			
			//cari umur 
			$tgl =date('d-m-Y',strtotime(Input::get('tanggal_lahir')));
			$umur=floor(time()-strtotime($tgl))/(60*60*24*365);
			$jml_iuran = (56 - $umur)*12;
			
			//cari besarnya iuran paket
			$paket = Paket::where('id_paket',Input::get('id_paket'))->get()->first();
			$thn = date('Y',strtotime(Input::get('tanggal_masuk')));
			$bln = str_replace("0","",date('m',strtotime(Input::get('tanggal_masuk'))));
			
			for($i=1;$i<=$jml_iuran;$i++){								
				if($bln<13){
					$bln_thn = strrev(substr(strrev('00'.$bln.'-'.$thn),0,7));
				}else{
					$bln = 1;
					$thn++;
					$bln_thn = strrev(substr(strrev('00'.$bln.'-'.$thn),0,7));
				}
				
				$bln++;
				
				$iuran = new Iuran();
				$iuran->id_peserta = $nomor;
				$iuran->cicilan_ke = $i;
				$iuran->bln_thn = $bln_thn;
				$iuran->iuran = $paket->iuran;
				$iuran->status = "TUNDA";
				$iuran->save();
				
			}
			
			
			
			Session::flash('message','ID Peserta : '.$nomor.' Successfully created a Peserta');
			return Redirect::to('peserta')->with('page','Peserta')->with('modul','Index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id_peserta)
	{
		$peserta = Peserta::find($id_peserta);
		$iuran = Iuran::where('id_peserta',$id_peserta)->get();
		return View::make('pht.peserta.show')->with('peserta',$peserta)->with('iuran',$iuran)
				->with('page','Peserta')->with('modul','Show');;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id_peserta)
	{
		$pdam = Pdam::Lists('nama_pdam','id_pdam');
		$peserta = Peserta::find($id_peserta);
		$paket = Paket::Lists('nama_paket','id_paket');
		$bank = Bank::Lists('nama_bank','id_bank');
		$status = Status::Lists('keterangan','id_status');
		return View::make('pht.peserta.edit')->with('peserta',$peserta)->with('page','Peserta')->with('modul','Edit')
		             ->with('pdam',$pdam)->with('paket',$paket)->with('bank',$bank)
					 ->with('status',$status);;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id_peserta)
	{
		$rules = array(
			'nama_peserta' =>'required|max:60',
			'tempat_lahir' => 'required',
			'tanggal_lahir' => array('required','date_format:d-m-Y'),
			'jenis_kelamin' => 'required',
			'alamat' => 'required',
			'telpon' => 'required',
			'handphone' => 'required',
			'id_pdam' => 'required',
			'id_paket' => 'required',
			'tanggal_masuk' => array('required','date_format:d-m-Y'),
			'tanggal_berhenti' => 'date_format:d-m-Y',
			'tanggal_proses' => 'date_format:d-m-Y',
			'nama_ahli_waris' => 'required',
			'id_bank' => 'required',
			'nomor_rekening' => 'required|numeric',
			'atas_nama' => 'required',
			'id_status' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('peserta/'.$id_peserta.'/edit')->withErrors($validator);
		}else{
			$peserta = Peserta::find($id_peserta);
			$peserta->nama_peserta = Input::get('nama_peserta');
			$peserta->tempat_lahir = Input::get('tempat_lahir');
			$peserta->tanggal_lahir = date('Y-m-d',strtotime(Input::get('tanggal_lahir')));
			$peserta->jenis_kelamin = Input::get('jenis_kelamin');
			$peserta->alamat = Input::get('alamat');
			$peserta->telpon = Input::get('telpon');
			$peserta->handphone = Input::get('handphone');
			$peserta->id_pdam = Input::get('id_pdam');
			$peserta->id_paket = Input::get('id_paket');
			$peserta->tanggal_masuk = date('Y-m-d',strtotime(Input::get('tanggal_masuk')));
			$peserta->tanggal_berhenti = date('Y-m-d',strtotime(Input::get('tanggal_berhenti')));
			$peserta->tanggal_proses = date('Y-m-d',strtotime(Input::get('tanggal_proses')));
			$peserta->nama_ahli_waris = Input::get('nama_ahli_waris');
			$peserta->id_bank = Input::get('id_bank');
			$peserta->nomor_rekening = Input::get('nomor_rekening');
			$peserta->atas_nama = Input::get('atas_nama');
			$peserta->id_status = Input::get('id_status');
			$peserta->save();
			
			Session::flash('message','Successfully update a Peserta');
			return Redirect::to('peserta')->with('page','Peserta')->with('modul','Index');;
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id_peserta)
	{
		$peserta = Peserta::find($id_peserta);
		$peserta->delete();
		
		$iuran = Iuran::where('id_peserta',$id_peserta);
		$iuran->delete();
		
		Session::flash('message','Successfully deleted Peserta');
		return Redirect::to('peserta')->with('page','Peserta')->with('modul','Index');
	}
	
	public function nomor(){
		$tahun = substr(Input::get('tanggal_masuk'),6,4);
		$bulan = substr(Input::get('tanggal_masuk'),3,2);
		
		$peserta = DB::table('pesertas')->select('id_peserta')->where(DB::raw('substring(id_peserta,1,4)'),$tahun)
		                                ->where(DB::raw('substring(id_peserta,5,2)'),$bulan)
										->orderBy('id_peserta','desc')->first();
		
		if(empty($peserta)){
			$nomor = strval($tahun).strval($bulan).strval('0001');	 
		}else{
			$nomor = $peserta->id_peserta+1;
		}
		
		return $nomor;
	}


}
