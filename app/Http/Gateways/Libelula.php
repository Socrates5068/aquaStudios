<?php
namespace App\Http\Gateways;

use Exception;

class LibelulaResponse
{
	public 	$error;
	public	$mensaje;
	public	$id_transaccion;
	public	$url_pasarela_pagos;
	public	$datos;
	public	$existente;
	
	public function tieneErrores()
	{
		if( (int)$this->error > 0 )
			return true;
		return false;
	}
	public function getLink()
	{
		return $this->url_pasarela_pagos;
	}
	public function getTransaccion()
	{
		return $this->id_transaccion;
	}
	public function bind($data)
	{
		array_map(function($k, $v)
		{
			if( property_exists($this, $k) )
				$this->$k = $v;
		}, array_keys($data), $data);
	}
}
class Libelula
{
	public	$appKey;
	public	$data = [];
	public	$endpoint = 'https://api.todotix.com/rest';
	
	public function __construct($key)
	{
		$this->appKey = $key;
	}
	public function setData(array $data)
	{
		$this->data = $data;
	}
	/**
	 * 
	 * @throws Exception
	 * @return \App\Http\Gateways\LibelulaResponse
	 */
	public function crearDeuda()
	{
		if( !$this->appKey )
			throw new Exception('LIBELULA ERROR: Se necesita un appkey');
		if( !$this->data )
			throw new Exception('LIBELULA ERROR: Datos para la deuda invalidos');
		$res = $this->request('/deuda/registrar');
		
		return $res;
	}
	/**
	 * 
	 * @param string $fecha_inicial
	 * @param string $fecha_final
	 */
	public function getTransacciones($fecha_inicial, $fecha_final)
	{
		$this->data = [
			'fecha_inicial' => $fecha_inicial,
			'fecha_final'	=> $fecha_final
		];
		//print_r($this->data);
		$res = $this->request('/deuda/consultar_pagos');
		
		return $res;
	}
	/**
	 * 
	 * @return \App\Http\Gateways\LibelulaResponse
	 */
	protected function request($endpoint)
	{
		$url = $this->endpoint . $endpoint;
		$ch = curl_init($url);
		
		//setup request to send json via POST
		/* $data = array(
		 'username' => 'codexworld',
		 'password' => '123456'
		 ); */
		
		$this->data['appkey'] = $this->appKey;
		$payload = json_encode($this->data);
		//attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//execute the POST request
		$result = curl_exec($ch);
		//close cURL resource
		curl_close($ch);
		//die($result);
		$obj = json_decode($result, true);
		/* $obj = (array)json_decode($result);
		$response = new LibelulaResponse();
		$response->bind( $obj);*/
		return $obj;
		//return $response;
	}
}