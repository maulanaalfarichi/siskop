<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',function()
{
	return View::make('sentry.login');
});

Route::get('portal',function()
{
	return View::make('portal')->with('page','Dashboard')->with('modul','Portal');
});

Route::get('pht',function()
{
	return View::make('pht.index')->with('page','Dashboard')->with('modul','Home');
});

Route::get('accounting',function()
{
	return View::make('accounting.index')->with('page','Dashboard')->with('modul','Home');
});

Route::get('usp',function()
{
	return View::make('usp.index')->with('page','Dashboard')->with('modul','Home');
});

Route::get('trading',function()
{
	return View::make('trading.index')->with('page','Dashboard')->with('modul','Home');
});


/*
|----------------------------------------------------------------------------
|all route for the application will be store here.
|----------------------------------------------------------------------------
*/



/*
|----------------------------------------------------------------------------
| MODUL PENSIUN HARI TUA
|----------------------------------------------------------------------------
*/
Route::get('laporanpeserta','LaporanController@peserta');
Route::post('tampilpeserta','LaporanController@tampilpeserta');
Route::get('rekeningkoranpht','LaporanController@rekeningkoran');
Route::post('tampilrekeningkoran','LaporanController@tampilrekeningkoran');
Route::get('rekapitulasikepesertaanpht','LaporanController@rekapitulasikepesertaan');
Route::post('tampilrekapitulasikepesertaan','LaporanController@tampilrekapitulasikepesertaan');
Route::get('laporantunggakan','LaporanController@laporantunggakan');
Route::post('tampillaporantunggakan','LaporanController@tampillaporantunggakan');
Route::get('laporankeuanganpht','LaporanController@laporankeuanganpht');
Route::post('tampillaporankeuanganpht','LaporanController@tampillaporankeuanganpht');
Route::get('register','UserController@register');
Route::post('register','UserController@doRegister');
Route::get('panduanclaim','ClaimController@panduanclaim');
Route::resource('division','DivisionController');
Route::resource('bank','BankController');
Route::resource('manfaat','ManfaatController');
Route::resource('paket','PaketController');
Route::resource('pdam','PdamController');
Route::resource('peserta','PesertaController');
Route::resource('status','StatusController');
Route::resource('group','GroupController');
Route::resource('user', 'UserController');
Route::resource('iuran', 'IuranController');
Route::resource('iurankolektif', 'IurankolektifController');
Route::resource('claim', 'ClaimController');


/*
|----------------------------------------------------------------------------
| MODUL ACCOUNTING
|----------------------------------------------------------------------------
*/
Route::resource('setup','SetupController');
Route::post('cari_rekening','SetupController@carirekening');
Route::resource('golongan','GolonganController');
Route::post('cari_golongan','GolonganController@carigolongan');
Route::resource('profil','ProfilController');
Route::resource('jurnalumum','JurnalumumController');
Route::post('cari_jurnalumum','JurnalumumController@carijurnalumum');
Route::resource('jurnaldetail','JurnaldetailController');
Route::resource('jurnalkas','JurnalkasController');
Route::resource('posting','PostingController');
Route::post('cari_posting','PostingController@cariposting');
Route::resource('bukujurnal','BukujurnalController');
Route::resource('neracapercobaan','NeracapercobaanController');
Route::resource('rugilaba','RugilabaController');
Route::resource('neraca','NeracaController');

/*
|----------------------------------------------------------------------------
| MODUL UNIT SIMPAN PINJAM
|----------------------------------------------------------------------------
*/
Route::resource('koperasi','KoperasiController');
Route::resource('jenissimpanan','JenissimpananController');
Route::resource('anggota','AnggotaController');
Route::resource('simpanan','SimpananController');
Route::resource('pengambilan','PengambilanController');
Route::resource('pinjamanheader','PinjamanheaderController');
Route::resource('pinjamandetail','PinjamandetailController');
Route::resource('bayarpinjaman','BayarpinjamanController');
Route::resource('lapanggota','LapanggotaController');
Route::resource('lapsimpanan','LapsimpananController');
Route::resource('lappinjaman','LappinjamanController');


/*
|----------------------------------------------------------------------------
| MODUL UNIT PENGADAAN BARANG DAN JASA
|----------------------------------------------------------------------------
*/
Route::resource('barang','BarangController');
Route::resource('pelanggan','PelangganController');
Route::resource('supplier','SupplierController');
Route::resource('ekspedisi','EkspedisiController');
Route::resource('sales','SalesController');
Route::resource('penjualan','PenjualanController');
Route::resource('penjualandetail','PenjualandetailjurnaController');
Route::resource('adjustment','AdjustmentController');
Route::resource('pembelian','PembelianController');
Route::resource('lapbarang','LapbarangController');
Route::resource('lappelanggan','LappelangganController');
Route::resource('lappenjualan','LappenjualanController');
Route::resource('lappembelian','LappembelianController');

// route digunakan untuk login
Route::get('login', array('uses' => 'UserController@login'));
Route::post('login', array('uses' => 'UserController@doLogin'));

// membuat group route dan sebelum mengakses route didalam group route ini kita
// harus login terlebih dahulu di tandai dengan code “'before' => 'sentry_auth'”
Route::group(array('before' => 'sentry_auth'), function()
{ 
 
		Route::get('crud', array(
			// as digunakan untuk penamaan route silahkan dibaca bagian route  
			'as' => 'crud.index',
			// digunakan untuk mengecek user berhak atau tidak mengakses route ini. Lihat fucntion di filter
			//sebelumnya “hasAccess” dan cqb.read ini adalah permissions atau kalau kita lihat di view group bagian
			//checkbox ada checkbox dengan nama “cqb.read”.
			'before' => 'hasAccess:cqb.read',
			'uses' => 'CrudController@index'
		));
 
		Route::get('crud/create', array(
			'as' => 'crud.create',
			'before' => 'hasAccess:cqb.create',
			'uses' => 'CrudController@create'
		));
 
		Route::post('crud/create', array(
			'as' => 'crud.store',
			'before' => 'hasAccess:cqb.create',
			'uses' => 'CrudController@store'
		));
 
		Route::get('crud/edit/{id}', array(
			'as' => 'crud.edit',
			'before' => 'hasAccess:cqb.update',
			'uses' => 'CrudController@edit'
		));
 
		Route::post('crud/update/{id}', array(
			'as' => 'crud.update',
			'before' => 'hasAccess:cqb.update',
			'uses' => 'CrudController@update'
		));
 
		Route::get('crud/destroy/{id}', array(
			'as' => 'crud.destroy',
			'before' => 'hasAccess:cqb.destroy',
			'uses' => 'CrudController@destroy'
		));

		// route untuk logout
		Route::get('logout', array('uses' => 'UserController@logout'));
 
});
