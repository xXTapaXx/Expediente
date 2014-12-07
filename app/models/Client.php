<?php

class Client extends Eloquent {

    protected $table = 'cliente';

    protected $primaryKey = 'cedula';

    public  $timestamps = false;
}