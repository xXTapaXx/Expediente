<?php

class UsersController extends \BaseController {

    //Esta funcion se encarga de saber si hay un usuario ya ha iniciado session.
    public function __construct()
    {

       //$this->beforeFilter('auth');

    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

        return View::make('users.index',array('users'=>$users));
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
        $user = new User;
        $user->username = Input::get('username'); // toma los datos del formulario por su name
        $user->password =  Hash::make(Input::get('password'));
        $user->real_name = Input::get('real_name');

        // guarda los datos
        $user->save();

        // mensaje
        Session::flash('message', 'Successfully created user');

        // redirecciona a la pantalla principal de users
        return Redirect::to('/admin/users');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

        return $user;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        // buscar la informacion del usuario
        $user = User::find($id);

        // actualiza la informacion del usuario con sus datos
        $user->username = Input::get('username'); // toma los datos del formulario por su name
        $user->real_name = Input::get('real_name');


        // comprueba si la contrasena esta vacia, si lo esta deja la contrasena como esta en la bd
        if(Input::get('password'))
        {
            $user->password = Hash::make(Input::get('password'));
        }

        // guardar los datos
        $user->save();

        // mensaje
        Session::flash('message', 'Successfully updated user');

        // redirecciona a la pantalla principal de users
        return Redirect::to('/admin/users');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        // buscar la informacion del usuario
        $user = User::find($id);

        // elimina el usuario
        $user->delete();

        // mensaje
        Session::flash('message', 'Successfully deleted  user');

        // redirecciona a la pantalla principal de users
        return Redirect::to('/admin/users');

    }


}
