<?php

class PenjualandetailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Penjualan::paginate(5);
		return View::make('trading.penjualan.index')->with('data',$data)
		->with('page','Penjualan')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id_barang' => 'required',
			'qty' => 'required|numeric',
			'harga' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('penjualandetail')->withErrors($validator)->withInput();
		}else{
			$barang = Barang::find(Input::get('id_barang'));
		
			$data = new Penjualandetail();
			$data->id_penjualan = Input::get('id_penjualan');
			$data->id_barang = Input::get('id_barang');
			$data->qty = Input::get('qty');
			$data->satuan = $barang->satuan;
			$data->harga = Input::get('harga');
			$data->jumlah = Input::get('qty') * Input::get('harga');
			$data->save();
			
			$penjualan = Penjualan::find(Input::get('id_penjualan'));
			
			//hitung total penjualan 
			$jumlah = Penjualandetail::where('id_penjualan','=',$penjualan->id);
			
			//masukan jumlah penjualan di header penjualan
			$penjualan->jumlah = $jumlah->sum('jumlah');
			
			//hitung total penjualan di header penjualan
			$total = ($jumlah->sum('jumlah') * (100 - $penjualan->diskon)/100 * (100 + $penjualan->ppn)/100) + $penjualan->ongkos_kirim ;
			
			$penjualan->total = $total;
			$penjualan->save();
			
			$data = Penjualandetail::where('id_penjualan','=',Input::get('id_penjualan'))->get();
			
			Session::flash('message','Successfully created a Penjualan Detail');
			return Redirect::to('penjualan/'.Input::get('id_penjualan'))->with('penjualan',$penjualan)->with('data',$data)
				->with('page','Penjualan Detail')->with('modul','Index');
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
		$barang = Barang::lists('nama_barang','id');
		return View::make('trading.penjualandetail.create')->with('barang',$barang)
		->with('id',$id)->with('page','Penjualan Detail')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data = Penjualandetail::find($id);
		$data->delete();
		
		$penjualan = Penjualan::find($data->id_penjualan);
		
		//hitung total penjualan 
		$jumlah = Penjualandetail::where('id_penjualan','=',$penjualan->id);
			
		//masukan jumlah penjualan di header penjualan
		$penjualan->jumlah = $jumlah->sum('jumlah');
			
		//hitung total penjualan di header penjualan
		$total = ($jumlah->sum('jumlah') * (100 - $penjualan->diskon)/100 * (100 + $penjualan->ppn)/100) + $penjualan->ongkos_kirim ;
			
		$penjualan->total = $total;
		$penjualan->save();
		
		Session::flash('message','Successfully deleted Penjualan Detail');
		return Redirect::to('penjualan/'.$data->id_penjualan )->with('page','Penjualan Detail')->with('modul','Index');
	}
	

}
