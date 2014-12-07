@extends('layouts.Dashboard')

@section('title_browser')
Users
@stop

@section('menu')
@include('layouts.Menu',array('ruta'=>'Clients'))
@stop

@section('js')

 {{ HTML::script('js/Clients.js'); }}

@stop

@section('content')

        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              {{Session::get('message')}}
            </div>
        @endif

        {{--Inicio row --}}
        <div class="row">

        <div class="col-lg-12">

              {{-- Inicio table --}}
             <table id="mytable" class="table table-bordred table-striped">

        <h1 class="title-top-table">Clients</h1>
            <a type="button" href="#" class="col-lg-2 btn btn-success submit-button pull-right" data-title="create" data-toggle="modal" data-target="#create" data-placement="top">
                 <span class="glyphicon glyphicon-plus"></span>Add
            </a>

            {{--Menu de la tabla--}}
            <thead>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Fecha Nacimiento</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Options</th>
            </thead>
            {{--Fin menu--}}

            <tbody>

            {{--Ciclo que recorre los usuarios y los muestra--}}
            @foreach($clients as $client)
                        <tr>
                        <td><a type="button" href="#" id="{{$client->cedula}}" data-title="show" data-toggle="modal" data-target="#show" data-placement="top">{{$client->cedula}}</a></td>
                        <td>{{$client->nombre}}</td>
                        <td>{{$client->fecha}}</td>
                        <td>{{$client->telefono}}</td>
                        <td>{{$client->correo}}</td>
                        <td>

                      {{--Inicio formualrio --}}
                      {{Form::open(array('id'=>'form'.$client->cedula,'url' => array('/admin/clients', $client->cedula),'method'=>'DELETE'))}}

                        <a type="button" id="{{$client->cedula}}" data-title="showAsignar" data-toggle="modal" data-target="#showAsignar" data-placement="top" href="#" class="btn btn-info"><span class="glyphicon glyphicon-tasks"></span> Asignar</a>
                       <a type="button" id="{{$client->cedula}}" data-title="edit" data-toggle="modal" data-target="#edit" data-placement="top" href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                       <a type="button" href="javascript:document.getElementById('form{{$client->cedula}}').submit()" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>

                       {{ Form::close() }}
                       {{--Final del formulario--}}
                        </td>
                        </tr>

                        @endforeach
             {{--Fin del ciclo--}}

            </tbody>


            </table>
            {{--Fin table--}}


            </div>

                </div> {{--Fin row--}}

    @stop

    {{--Vista del CRUD--}}
       {{--}} @include('clients.show'){{--}}
        @include('clients.create')
        @include('clients.edit')
        @include('clients.asignar')