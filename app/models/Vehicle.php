<?php

class Vehicle extends Eloquent {

    protected $table = 'vehiculo';

    protected $primaryKey = 'placa';

    public  $timestamps = false;
}