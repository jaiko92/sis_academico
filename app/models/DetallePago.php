<?php

class DetallePago extends Eloquent {

	/**
	 * Tabla de la base de datos usada por el modelo
	 *
	 * @var string
	 */
	protected $table = 'tdetalle_pago';
	protected $primaryKey  = 'iddetalle_pago';
	public $timestamps=false;

	
}