<?php

class ClientsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::all();

        return View::make('clients.index',array('clients'=>$clients));
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
        // guarda la informacion del usuario con sus datos

        $clients = new Client;
        $clients->cedula = Input::get('cedula'); // toma los datos del formulario por su name
        $clients->nombre = Input::get('nombre');
        $clients->fecha = Input::get('fecha');
        $clients->telefono = Input::get('telefono');
        $clients->correo = Input::get('correo');
       // $clients->fecha_insercion = Date.now();

        // guarda los datos
        $clients->save();

        // mensaje
        Session::flash('message', 'Successfully created student');

        // redirecciona a la pantalla principal de students
        return Redirect::to('/admin/students');
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
		$clients = Client::find($id);

        return $clients;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $clients = Client::find($id);

        $clients->nombre = Input::get('nombre');
        $clients->fecha = Input::get('fecha');
        $clients->telefono = Input::get('telefono');
        $clients->correo = Input::get('correo');


        // guarda los datos
        $clients->save();

        // mensaje
        Session::flash('message', 'Successfully updated client');

        // redirecciona a la pantalla principal de users
        return Redirect::to('/admin/clients');
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
        $clients = Client::find($id);

        // elimina el usuario
        $clients->delete();

        // mensaje
        Session::flash('message', 'Successfully deleted  client');

        // redirecciona a la pantalla principal de users
        return Redirect::to('/admin/clients');
	}

    public function getAsignar($id)
    {
        // buscar la informacion del usuario

        $vehicle = Vehicle::where('asignado','=','N')->get();

        $vehicleClient = Vehicle::join('Vehiculo_cliente', 'vehiculo.placa','=','Vehiculo_cliente.placa')
        ->where('cliente','=',$id)
        ->get();

        $data= array('vehicle' => $vehicle, 'client' => $vehicleClient);

       return $data;
    }

    public function Asignar($cedula, $placa)
    {
        // buscar la informacion del usuario
        $vehicle = Vehicle::find($placa);

        $vehicle->asignado = 'A';



        $vehicle_Client = new VehicleClient;

        $vehicle_Client->placa = $placa;
        $vehicle_Client->cliente = $cedula;


        $vehicle->save();
        $vehicle_Client->save();

        return $cedula.$placa;
    }

    public function DesAsignar($cedula, $placa)
    {
        // buscar la informacion del usuario
         $vehicle = Vehicle::find($placa);

         $vehicle->asignado = 'N';



         $vehicle_Client = DB::table('vehiculo_cliente')
         ->where('placa','=',$placa)
         ->where('cliente','=',$cedula)
             ->delete();

         $vehicle->save();



        return $vehicle_Client;
    }


}
