<?php

namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
	private function successResponse($data, $code){
		return response()->json($data, $code);
	}

	protected function errorResponse($message, $code){
		return response()->json(['error'=> $message, 'code' => $code], $code);
	}

	private function responseJson($data){
		return response()->json($data);
	}

	protected function showAll(Collection $collection, $code = 200){
		return $this->successResponse(['data'=> $collection], $code);
	}


	protected function showOne(Model $instance, $code = 201){
		return $this->successResponse(['data'=> $instance, 'code' => $code], $code);
	}

	protected function deletedModel($code = 201){
		return $this->successResponse(['data'=> 'Usuario Eliminado', 'code' => $code], $code);
	}

	protected function deletedData($code = 201){
		return $this->successResponse(['data'=> 'Registro Eliminado', 'code' => $code], $code);
	}
}