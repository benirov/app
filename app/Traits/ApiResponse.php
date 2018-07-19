<?php

namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
	private function successResponse($data, $code){
		return reponse()->json($data, $code);
	}

	protected function errorResponse($message, $code){
		return reponse()->json(['error'=> $message, 'code' => $code], $code);
	}

	protected function showAll(Collection $collection, $code = 200){
		return $this->successResponse(['data'=> $collection], $code);
	}


	protected function showOne(Model $instance, $code = 200){
		return $this->successResponse(['data'=> $instance], $code);
	}
}