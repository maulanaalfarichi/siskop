<?php 
class UserController extends \BaseController{
	public function index()
	{
		$user = User::paginate(5);
		return View::make('sentry.user.index')->with('user',$user)
		              ->with('page','User')->with('modul','Index');
	}
	
	public function create()
	{
		$group = Group::lists('name', 'id');
		$data =
		[
			'group' => $group
		];
		return View::make('sentry.user.create',$data)->with('page','User')->with('modul','Create');
	}
	 
	public function store()
	{
		$rules = array(
			'nama_depan' => 'required',
			'nama_belakang' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|between:4,11|confirmed',
			'confirmation_password' => 'between:4,11',
			'group' => 'required',
		);
	 
		$validator = Validator::make(Input::all(), $rules);
	 
		if ($validator->fails()) {  
			return Redirect::to('user/create')->withErrors($validator)->withInput();
		} else {           
			 
			try
			{
				$user = Sentry::createUser(array(
					'first_name'        => Input::get('nama_depan'),
					'last_name' => Input::get('nama_belakang'),
					'email' => Input::get('email'),
					'password' => Input::get('password'),
					'activated' => true,
				));
	 
				$groupbyid = Sentry::findGroupById(Input::get('group'));
				$user->addGroup($groupbyid);
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
				Session::flash('message', 'Login field is required.');
				return Redirect::to('user');
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
				Session::flash('message', 'Password field is required.');
				return Redirect::to('user');
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
				Session::flash('message', 'User with this login already exists.');
				return Redirect::to('user');
			}
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
			{
				Session::flash('message', 'Group was not found.');
				return Redirect::to('user');
			}
		Session::flash('message', 'Data Berhasil Ditambahkan');
		return Redirect::to('user');
		}
	}
	
	
	public function edit($id)
	{
		$userbyid = Sentry::findUserByID($id);
		$groupbyuser = $userbyid->getGroups();
		$groupbyuser = json_decode($groupbyuser, true);
		$group = Group::lists('name', 'id');
		$data =
		[
			'userbyid' => $userbyid,
			'group' => $group,
			'groupbyuser' => $groupbyuser[0]['id']
		];
		return View::make('sentry.user.edit', $data)->with('page','User')->with('modul','Edit');
	}
	 
	public function update($id)
	{
		$rules = array(
			'nama_depan' => 'required',
			'nama_belakang' => 'required',
			'email' => 'required|email|unique:users,email,'. $id, 
			'password' => 'required|between:4,11|confirmed',
			'confirmation_password' => 'between:4,11',
			'group' => 'required',
		);
	 
		$validator = Validator::make(Input::all(), $rules);
	 
		if ($validator->fails()) {  
			return Redirect::to('user/'.$id.'/edit')->withErrors($validator)->withInput();
		} else {
			try
			{
			$user = Sentry::findUserById($id);
			$groupbyuser = $user->getGroups();
			$groupbyuser = json_decode($groupbyuser, true);
			$groupbyuser = Sentry::findGroupById($groupbyuser[0]['id']);
			$user->removeGroup($groupbyuser);
	 
			$groupbyuser = Sentry::findGroupById(Input::get('group'));
			$user->addGroup($groupbyuser);
			 
			$user->first_name        = Input::get('nama_depan');
			$user->last_name = Input::get('nama_belakang');
			$user->email = Input::get('email');
			$user->password = Input::get('password');
	 
			if ($user->save())
			{
				Session::flash('message', 'Data Berhasil Ditambahkan');
				return Redirect::to('user');
			}
			else
			{
				Session::flash('message', 'Data Gagal Ditambahkan');
				return Redirect::to('user');
			}
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
				Session::flash('message', 'User with this login already exists.');
				return Redirect::to('user');
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
				Session::flash('message', 'User was not found.');
				return Redirect::to('user');
			}
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
			{
				Session::flash('message', 'Group was not found.');
				return Redirect::to('user');
			}
		}  
	}
	
	public function destroy($id)
	{
		try
		{
			$user = Sentry::findUserById($id);
			$user->delete();
		 }
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			Session::flash('message', 'User was not found.');
			return Redirect::to('user');
		}
		Session::flash('message', 'Data Berhasil Dihapus');
		return Redirect::to('user');
	}
		
	
//======================================================================================================================================	
	public function register()
	{
		return View::make('sentry.register')->with('page','Bank')->with('modul','Index');
	}
	
	public function doRegister()
	{
		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|between:4,10|confirmed',
			'password_confirmation' => 'between:4,10'
		);
	 
		$validator = Validator::make(Input::all(), $rules);
	 
		if ($validator->fails()) {
			return Redirect::to('register')
				->withErrors($validator)->withInput();
		} else {
			try
			{
				$user = Sentry::register(array(
					'first_name'  => Input::get( 'first_name' ),
					'last_name'   => Input::get( 'last_name' ),
					'email'     => Input::get( 'email' ),
					'password'  => Hash::make(Input::get( 'password' )),
					'activated' => true,
				));
	 
				$activationCode = $user->getActivationCode();
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
				Session::flash('message', 'Login field is required.');
				return Redirect::to('register');
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
				Session::flash('message', 'Password field is required.');
				return Redirect::to('register')->with('page','User')->with('modul','Register');
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
				Session::flash('message', 'User with this login already exists.');
				return Redirect::to('register')->with('page','User')->with('modul','Register');
			}
	 
			Session::flash('message', 'Successfully Register, Please Login');
			return Redirect::to('register')->with('page','User')->with('modul','Register');
		}   
	}
	
	
	public function login()
	{
		return View::make('sentry.login');
	}
	
	public function doLogin()
	{
		$rules = array(
			'email'    => 'required|email',
			'password' => 'required|alphaNum|min:5'
		);
	 
		$validator = Validator::make(Input::all(), $rules);
	 
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
	 
			try
			{
		 
				$credentials = array(
				'email'     => Input::get('email'),
				'password'  => Input::get('password')
			);
	 
			// digunakan untuk login
			$user = Sentry::authenticate($credentials, false);
				if($user){
					return Redirect::to('portal')->with('page','User')->with('modul','Login');
				}
	 
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
				Session::flash('message', 'Login field is required.');
				return Redirect::to('login')
				->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
				Session::flash('message', 'Password field is required.');
				return Redirect::to('login')
				->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
			{
				Session::flash('message', 'Wrong password, try again.');
				return Redirect::to('login')
				->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
				Session::flash('message', 'User was not found.');
				return Redirect::to('login')
				->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
				Session::flash('message', 'User is not activated.');
				return Redirect::to('login')
				->withInput(Input::except('password'));
			}
	 
			// The following is only required if the throttling is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
				Session::flash('message', 'User is suspended.');
				return Redirect::to('login')
				->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
				Session::flash('message', 'User is banned.');
				return Redirect::to('login')
				->withInput(Input::except('password'));
			}
		}
	}
	
	public function logout()
	{
		sentry::logout();
		return View::make('login');
	}
}